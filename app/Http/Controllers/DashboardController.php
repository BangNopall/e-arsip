<?php

namespace App\Http\Controllers;

use App\Models\DokumenSuratMasuk;
use App\Models\suratMasuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboarddev');
    }
    public function suratMasuk()
    {
        // Mengambil semua data surat masuk
        $suratmasuk = suratMasuk::all();
        return view('suratmasukdev', compact('suratmasuk'));
    }
    public function addSuratMasuk()
    {
        return view('partials.suratMasuk.adddev');
    }
    public function storeSuratMasuk(Request $request)
    {
        $validatedData = $request->validate([
            'perihal' => 'required',
            'nama_pengirim' => 'required',
            'nomor_registrasi' => 'required|numeric',
            'tanggal_surat' => 'required',
            'tanggal_diterima' => 'required',
            'lampiran' => 'required|numeric',
            'alamat_asal' => 'required',
            'alamat_sekarang' => 'required',
            'foto.*' => 'required',
            'nama_penerima' => 'required',
        ]);

        // Apabila checkbox dicentang maka simpanAgenda bernilai 1, jika tidak maka bernilai 0
        if ($request->has('simpanAgenda')) {
            $validatedData['simpanAgenda'] = 1;
        } else {
            $validatedData['simpanAgenda'] = 0;
        }

        $suratMasuk = new suratMasuk();
        $suratMasuk->perihal = $validatedData['perihal'];
        $suratMasuk->nama_pengirim = $validatedData['nama_pengirim'];
        $suratMasuk->no_registrasi = $validatedData['nomor_registrasi'];
        $suratMasuk->tanggal_surat = $validatedData['tanggal_surat'];
        $suratMasuk->tanggal_terima = $validatedData['tanggal_diterima'];
        $suratMasuk->lampiran = $validatedData['lampiran'];
        $suratMasuk->alamat_asal = $validatedData['alamat_asal'];
        $suratMasuk->alamat_sekarang = $validatedData['alamat_sekarang'];
        $suratMasuk->nama_penerima = $validatedData['nama_penerima'];
        $suratMasuk->is_rapat = $validatedData['simpanAgenda'];
        $suratMasuk->save();

        // simpan foto ke dalam tabel dokumen_surat_masuk
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $nama_file = $file->getClientOriginalName();
                $file->move(public_path() . '/images/dokumen-foto', $nama_file);
    
                $dokumenSuratMasuk = new DokumenSuratMasuk();
                $dokumenSuratMasuk->surat_masuk_id = $suratMasuk->id;
                $dokumenSuratMasuk->nama_file = $nama_file;
                $dokumenSuratMasuk->path = '/images/dokumen-foto/' . $nama_file;
                $dokumenSuratMasuk->save();
            }
        }

        return redirect()->route('dashboard.surat-masuk')->with('success', 'Surat Masuk Berhasil Ditambahkan');
    }
    public function editSuratMasuk($id)
    {
        $suratmasuk = suratMasuk::find($id);
        return view('partials.suratMasuk.editdev', compact('suratmasuk'));
    }

    public function addDisposisi()
    {
        return view('partials.disposisi.adddev');
    }
}
