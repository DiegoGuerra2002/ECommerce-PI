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
