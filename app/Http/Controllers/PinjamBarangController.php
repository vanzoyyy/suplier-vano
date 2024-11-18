<?php

namespace App\Http\Controllers;

use App\Models\PinjamBarang; // Changed 'BarangKeluar' to 'PinjamBarang'
use Illuminate\Http\Request;

class PinjamBarangController extends Controller { // Changed 'BarangKeluarController' to 'PinjamBarangController'
   
   // Menampilkan semua data pinjam barang
   public function index()
   {
       $pinjamBarangs = PinjamBarang::all(); // Changed 'barangKeluars' to 'pinjamBarangs'
       return view('pinjam_barang.index', compact('pinjamBarangs')); // Changed 'barang_keluar.index' to 'pinjam_barang.index'
   }

   // Menampilkan form untuk membuat pinjam barang baru
   public function create()
   {
       return view('pinjam_barang.create'); // Changed 'barang_keluar.create' to 'pinjam_barang.create'
   }

   // Menyimpan data pinjam barang ke database
   public function store(Request $request)
   {
       $validated = $request->validate([
           'id_pinjam' => 'required|integer',
           'peminjam' => 'required|string|max:255',
           'tgl_pinjam' => 'nullable|string',
           'id_barang' => 'nullable|string|max:15',
           'nama_barang' => 'nullable|string|max:15',
           'jml_barang' => 'nullable|string|max:15',
           'tgl_kembali' => 'nullable|string|max:15',
           'kondisi' => 'nullable|string|max:15',
       ]);

       PinjamBarang::create($validated); // Changed 'BarangKeluar' to 'PinjamBarang'

       return redirect()->route('pinjam_barang.index')->with('success', 'Pinjam Barang berhasil ditambahkan.'); // Changed 'barang_keluar' to 'pinjam_barang'
   }

   // Menghapus data pinjam barang dari database
   public function destroy(PinjamBarang $pinjamBarang) // Changed 'BarangKeluar' to 'PinjamBarang'
   {
       $pinjamBarang->delete(); // Changed 'barangKeluar' to 'pinjamBarang'

       return redirect()->route('pinjam_barang.index')->with('success', 'Data Pinjam Barang berhasil dihapus.'); // Changed 'barang_keluar' to 'pinjam_barang'
   }

   // Show the edit form for a specific pinjam barang
   public function edit($id)
   {
       $pinjamBarangs = PinjamBarang::find($id); // Changed 'barangKeluar' to 'pinjamBarang'

       // Check if the pinjamBarang exists
       if (!$pinjamBarangs) {
           return redirect()->route('pinjam_barang.index')->with('error', 'Pinjam Barang not found.'); // Changed 'barang_keluar' to 'pinjam_barang'
       }
       return view('pinjam_barang.edit', compact('pinjamBarangs')); // Changed 'barang_keluar.edit' to 'pinjam_barang.edit'
   }

   // Update pinjam barang data
   public function update(PinjamBarang $pinjamBarang, Request $request) // Changed 'BarangKeluar' to 'PinjamBarang'
   {
       // Validasi data request jika diperlukan
       $validatedData = $request->validate([
          'peminjam' => 'required|string|max:255',
           'tgl_pinjam' => 'nullable|string',
           'id_barang' => 'nullable|string|max:15',
           'nama_barang' => 'nullable|string|max:15',
           'jml_barang' => 'nullable|string|max:15',
           'tgl_kembali' => 'nullable|string|max:15',
           'kondisi' => 'nullable|string|max:15',
       ]);

       // Update pinjam barang data
       $pinjamBarang->update($validatedData); // Changed 'barangKeluar' to 'pinjamBarang'

       return redirect()->route('pinjam_barang.index')->with('success', 'Pinjam Barang data successfully updated.'); // Changed 'barang_keluar' to 'pinjam_barang'
   }
}
