<?php

namespace App\Http\Controllers;
use App\Models\Pbebida;
use Illuminate\Http\Request;

class PbebidaController extends Controller
{
    public function index()
    {
        $pbebidas = Pbebida::paginate(5);
        return view('indexB', compact('pbebidas'));
    }
    public function pBebidas()
    {
        $pbebidas = Pbebida::all(); // Otra forma de obtener los productos
        return view('productosBebidas')->with('pbebidas', $pbebidas);
    }
    public function agregaralcarrito($id) {
        $pbebida = Pbebida::findOrFail($id);
        $carrito = session()->get('carrito', []);
    
        // Verificar si el producto ya está en el carrito
        if(isset($carrito[$id])) {
            // Si el producto ya está en el carrito, incrementar la cantidad
            $carrito[$id]['quantity']++;
        } else {
            // Si el producto no está en el carrito, añadirlo
            $carrito[$id] = [
                "nombre" => $pbebida->nombre,
                "quantity" => 1,
                "precio" => $pbebida->precio,
                "imagen" => $pbebida->imagen
            ];
        }
    
        // Guardar el carrito actualizado en la sesión
        session()->put('carrito', $carrito);
    
        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->back()->with('success', 'El Producto se ha agregado al carrito');
    }

    public function deleteCartItem($id)
    {
        $carrito = session()->get('carrito', []);

        if(isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }
    public function emptyCart()
    {
        session()->forget('carrito');

        return redirect()->back()->with('success', 'Todos los productos han sido eliminados del carrito');
    }
    // CartController.php

    public function showCarrito()
    {
        // Verificar si el carrito existe en la sesión
        $carrito = session()->get('carrito', []);
        
        // Calcular el total de todos los productos en el carrito
        $total = array_reduce($carrito, function($carry, $item) {
            return $carry + ($item['precio'] * $item['quantity']);
        }, 0);

        // Pasar el carrito y el total a la vista
        return view('carrito', compact('carrito', 'total'));
    }

    
    public function productoCarrito(){
        return view('carrito');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crearB');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024',
            'precio' => 'required|numeric|min:0', // Validación para el precio
        ]);
    
        $pbebida = $request->all();
    
        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'images/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $pbebida['imagen'] = $imagenProducto;
        }
    
        Pbebida::create($pbebida);
        return redirect()->route('pbebidas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pbebida $pbebida)
    {
        return view('editarB', compact('pbebida'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pbebida $pbebida)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $prod = $request->all();
        if ($imagen = $request->file('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($pbebida->imagen) {
                $ruta = public_path('images/' . $pbebida->imagen);
                if (file_exists($ruta)) {
                    unlink($ruta);
                }
            }

            // Guardar la nueva imagen
            $rutaGuardarImg = 'images/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $prod['imagen'] = $imagenProducto;
        } else {
            // Si no se cargó una nueva imagen, mantener la existente
            $prod['imagen'] = $pbebida->imagen;
        }

        // Actualizar los datos del producto
        $pbebida->update($prod);
        
        return redirect()->route('pbebidas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pbebida $pbebida)
    {
        $pbebida->delete();
        return redirect()->route('pbebidas.index');
    }
}
