<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\Csv\Reader;

class ProductImportController extends Controller
{
    public function import(Request $request)
    {
        $file = storage_path('app/public/produtos.csv'); // Caminho do CSV
        $csv = Reader::createFromPath($file, 'r');
        $csv->setHeaderOffset(0); // Assume que a primeira linha é o cabeçalho

        foreach ($csv as $record) {
            Product::create([
                'name' => $record['name'],
                'slug' => Str::slug($record['name'], '-'),
                'short_description' => $record['short_description'],
                'long_description' => $record['long_description'],
                'status' => $record['status'],
                'regular_price' => $record['regular_price'],
                'sale_price' => $record['sale_price'],
                'image' => $record['image'],
                'images' => $record['images'],
                'category_id' => $record['category_id'],
            ]);
        }

        return back()->with('success', 'Produtos importados com sucesso!');
    }
}
