<?php

namespace App\Http\Controllers;
use App\Models\Pcoducto;
use Illuminate\Http\Request;

class PcoductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pcoductos = Pcoducto::paginate(5);
        return view('indexC', compact('pcoductos'));
    }
    public function pConge()
    {
        $pcoductos = Pcoducto::all(); // Otra forma de obtener los productos
        return view('productosCongelados')->with('pcoductos', $pcoductos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crearC');
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
    
        $pcoducto = $request->all();
    
        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'images/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $pcoducto['imagen'] = $imagenProducto;
        }
    
        Pcoducto::create($pcoducto);
        return redirect()->route('pcoductos.index');
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
    public function edit(Pcoducto $pcoducto)
    {
        return view('editarC', compact('pcoducto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pcoducto $pcoducto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $prod = $request->all();
        if ($imagen = $request->file('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($pcoducto->imagen) {
                $ruta = public_path('images/' . $pcoducto->imagen);
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
            $prod['imagen'] = $pcoducto->imagen;
        }

        // Actualizar los datos del producto
        $pcoducto->update($prod);
        
        return redirect()->route('pcoductos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pcoducto $pcoducto)
    {
        $pcoducto->delete();
        return redirect()->route('pcoductos.index');
    }
}
