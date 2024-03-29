<?php

namespace App\Http\Controllers;
use App\Models\Ppoducto;
use Illuminate\Http\Request;

class PpoductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ppoductos = Ppoducto::paginate(5);
        return view('indexP', compact('ppoductos'));
    }
    public function pCuida()
    {
        $ppoductos = Ppoducto::all(); // Otra forma de obtener los productos
        return view('productosCuidado')->with('ppoductos', $ppoductos);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crearP');
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
    
        $ppoducto = $request->all();
    
        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'images/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $ppoducto['imagen'] = $imagenProducto;
        }
    
        Ppoducto::create($ppoducto);
        return redirect()->route('ppoductos.index');
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
    public function edit(Ppoducto $ppoducto)
    {
        return view('editarP', compact('ppoducto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ppoducto $ppoducto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $prod = $request->all();
        if ($imagen = $request->file('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($ppoducto->imagen) {
                $ruta = public_path('images/' . $ppoducto->imagen);
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
            $prod['imagen'] = $ppoducto->imagen;
        }

        // Actualizar los datos del producto
        $ppoducto->update($prod);
        
        return redirect()->route('ppoductos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ppoducto $ppoducto)
    {
        $ppoducto->delete();
        return redirect()->route('ppoductos.index');
    }
}
