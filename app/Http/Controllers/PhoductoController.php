<?php

namespace App\Http\Controllers;
use App\Models\Phoducto;
use Illuminate\Http\Request;

class PhoductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phoductos = Phoducto::paginate(5);
        return view('indexH', compact('phoductos'));
    }
    public function pHogar()
    {
        $phoductos = Phoducto::all(); // Otra forma de obtener los productos
        return view('productosHogar')->with('phoductos', $phoductos);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crearH');
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
    
        $phoducto = $request->all();
    
        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'images/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $phoducto['imagen'] = $imagenProducto;
        }
    
        Phoducto::create($phoducto);
        return redirect()->route('phoductos.index');
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
    public function edit(Phoducto $phoducto)
    {
        return view('editarH', compact('phoducto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phoducto $phoducto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $prod = $request->all();
        if ($imagen = $request->file('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($phoducto->imagen) {
                $ruta = public_path('images/' . $phoducto->imagen);
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
            $prod['imagen'] = $phoducto->imagen;
        }

        // Actualizar los datos del producto
        $phoducto->update($prod);
        
        return redirect()->route('phoductos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phoducto $phoducto)
    {
        $phoducto->delete();
        return redirect()->route('phoductos.index');
    }
}
