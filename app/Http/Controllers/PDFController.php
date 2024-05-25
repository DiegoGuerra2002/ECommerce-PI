<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function generatePDF()
{
    $carrito = session('carrito', []);
    $total = array_reduce($carrito, function ($carry, $item) {
        return $carry + ($item['precio'] * $item['quantity']);
    }, 0);
    
    $user = Auth::user();
    $date = date('Y-m-d');
    $fileName = 'carrito_' . $date . '.pdf'; // Nombre del archivo con la fecha actual

    $data = [
        'carrito' => $carrito,
        'total' => $total,
        'user' => $user,
        'date' => $date,
    ];

    $pdf = PDF::loadView('carritoPDF', $data);

    return $pdf->download($fileName);
}

}
