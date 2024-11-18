<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar; // Changed 'BarangMasuk' to 'BarangKeluar'
use Illuminate\Http\Request;

class BarangKeluarController extends Controller { // Changed 'BarangMasukController' to 'BarangKeluarController'
   
   // Menampilkan semua data barang keluar
   public function index()
   {
       $barangKeluars = BarangKeluar::all(); // Changed 'barangMasuks' to 'barangKeluars'
       return view('barang_keluar.index', compact('barangKeluars')); // Changed 'barang_masuk.index' to 'barang_keluar.index'
   }

   // Menampilkan form untuk membuat barang keluar baru
   public function create()
   {
       return view('barang_keluar.create'); // Changed 'barang_masuk.create' to 'barang_keluar.create'
   }

   // Menyimpan data barang keluar ke database
   public function store(Request $request)
   {
       $validated = $request->validate([
           'id_barang' => 'required|integer',
           'nama_barang' => 'required|string|max:255',
           'tgl_keluar' => 'nullable|string', // Changed 'tgl_masuk' to 'tgl_keluar'
           'jml_keluar' => 'nullable|string|max:15', // Changed 'jml_masuk' to 'jml_keluar'
           'lokasi' => 'nullable|string|max:15',
           'penerima' => 'nullable|string|max:15',
       ]);

       BarangKeluar::create($validated); // Changed 'BarangMasuk' to 'BarangKeluar'

       return redirect()->route('barang_keluar.index')->with('success', 'Barang Keluar berhasil ditambahkan.'); // Changed 'barang_masuk' to 'barang_keluar'
   }

   // Menghapus data barang keluar dari database
   public function destroy(BarangKeluar $barangKeluars) // Changed 'BarangMasuk' to 'BarangKeluar'
   {
       $barangKeluar->delete(); // Changed 'barangMasuk' to 'barangKeluar'

       return redirect()->route('barang_keluar.index')->with('success', 'Data Barang Keluar berhasil dihapus.'); // Changed 'barang_masuk' to 'barang_keluar'
   }

   // Show the edit form for a specific barang keluar
   public function edit($id)
   {
       $barangKeluars = BarangKeluar::find($id); // Changed 'barangMasuk' to 'barangKeluar'

       // Check if the barangKeluar exists
       if (!$barangKeluars) {
           return redirect()->route('barang_keluar.index')->with('error', 'Barang Keluar not found.'); // Changed 'barang_masuk' to 'barang_keluar'
       }
       return view('barang_keluar.edit', compact('barangKeluars')); // Changed 'barang_masuk.edit' to 'barang_keluar.edit'
   }

   // Update barang keluar data
   public function update(BarangKeluar $barangKeluar, Request $request) // Changed 'BarangMasuk' to 'BarangKeluar'
   {
       // Validasi data request jika diperlukan
       $validatedData = $request->validate([
           'nama_barang' => 'required|string|max:255',
           'tgl_keluar' => 'nullable|string', // Changed 'tgl_masuk' to 'tgl_keluar'
           'jml_keluar' => 'nullable|string|max:15', // Changed 'jml_masuk' to 'jml_keluar'
           'lokasi' => 'nullable|string|max:15',
           'penerima' => 'nullable|string|max:15',
       ]);

       // Update barang keluar data
       $barangKeluar->update($validatedData); // Changed 'barangMasuk' to 'barangKeluar'

       return redirect()->route('barang_keluar.index')->with('success', 'Barang Keluar data successfully updated.'); // Changed 'barang_masuk' to 'barang_keluar'
   }
}
