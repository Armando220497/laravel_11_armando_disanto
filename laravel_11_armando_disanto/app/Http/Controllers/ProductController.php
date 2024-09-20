<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Aggiungi questa riga

class ProductController extends Controller
{


    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        // Valida i dati del form
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validazione dell'immagine
        ]);

        // Controlla se il file immagine è stato caricato
        if ($request->hasFile('img')) {
            // Prendi il file dell'immagine e salvalo nel disco 'public/img'
            $imgPath = $request->file('img')->store('img', 'public'); // Usa il disco 'public'
        } else {
            $imgPath = null; // Nel caso in cui l'immagine non venga caricata
        }

        // Crea un nuovo prodotto con i dati e il percorso dell'immagine
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'img' => $imgPath, // Usa il percorso dell'immagine per salvarlo nel database
        ]);

        return redirect()->route('product.index')->with('success', 'Prodotto creato con successo!');
    }

    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }
}
