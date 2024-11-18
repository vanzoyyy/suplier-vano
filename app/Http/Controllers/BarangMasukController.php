<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk; // Changed 'Stok' to 'BarangMasuk'
use Illuminate\Http\Request;

class BarangMasukController extends Controller { // Changed 'StokController' to 'BarangMasukController'
   
   // Menampilkan semua data barang masuk
   public function index()
   {
       $barangMasuks = BarangMasuk::all(); // Changed 'stoks' to 'barangMasuks'
       return view('barang_masuk.index', compact('barangMasuks')); // Changed 'stok.index' to 'barang_masuk.index'
   }

   // Menampilkan form untuk membuat barang masuk baru
   public function create()
   {
       return view('barang_masuk.create'); 
   }

   // Menyimpan data barang masuk ke database
   public function store(Request $request)
   {
       $validated = $request->validate([
           'id_barang' => 'required|integer',
           'nama_barang' => 'required|string|max:255',
           'tgl_masuk' => 'nullable|string',
           'jml_masuk' => 'nullable|string|max:15',
           'id_suplier' => 'nullable|string|max:15',
       ]);

       BarangMasuk::create($validated); // Changed 'Stok' to 'BarangMasuk'

       return redirect()->route('barang_masuk.index')->with('success', 'Barang Masuk berhasil ditambahkan.'); // Changed 'stok' to 'barang_masuk'
   }

   // Menghapus data barang masuk dari database
   public function destroy(BarangMasuk $barangMasuk) // Changed 'Stok' to 'BarangMasuk'
   {
       $barangMasuk->delete(); // Changed 'stok' to 'barangMasuk'

       return redirect()->route('barang_masuk.index')->with('success', 'Data Barang Masuk berhasil dihapus.'); // Changed 'stok' to 'barang_masuk'
   }

   // Show the edit form for a specific barang masuk
   public function edit($id)
   {
       $barangMasuks = BarangMasuk::find($id); // Changed 'stok' to 'barangMasuk'

       // Check if the barangMasuk exists
       if (!$barangMasuks) {
           return redirect()->route('barang_masuk.index')->with('error', 'Barang Masuk not found.'); // Changed 'stok' to 'barang_masuk'
       }
       return view('barang_masuk.edit', compact('barangMasuks')); // Changed 'stok.edit' to 'barang_masuk.edit'
   }

   // Update barang masuk data
   public function update(BarangMasuk $barangMasuk, Request $request) // Changed 'Stok' to 'BarangMasuk'
   {
       // Validasi data request jika diperlukan
       $validatedData = $request->validate([
           'nama_barang' => 'required|string|max:255',
           'tgl_masuk' => 'nullable|string',
           'jml_masuk' => 'nullable|string|max:15',
           'id_suplier' => 'nullable|string|max:15',
       ]);

       // Update barang masuk data
       $barangMasuk->update($validatedData); // Changed 'stok' to 'barangMasuk'

       return redirect()->route('barang_masuk.index')->with('success', 'Barang Masuk data successfully updated.'); // Changed 'stok' to 'barang_masuk'
   }
}
