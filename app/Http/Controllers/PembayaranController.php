<?php

namespace App\Http\Controllers;

use App\Models\RefMetodePembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {

        $metode = RefMetodePembayaran::all();


        return view('user.pembayaran');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('file');
        $filename = time() . '.' . $file->extension();
        $file->move(storage_path('app/public/buktibayar'), $filename);

        return redirect()->back()->with('success', 'File berhasil diupload');
    }
}
