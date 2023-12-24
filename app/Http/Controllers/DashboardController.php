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
        return view('dashboard');
    }
    public function suratMasuk(Request $request)
    {
        $search = $request->input('search');
        $query = suratMasuk::query();

        if ($search) {
            // Menambahkan kondisi pencarian ke query
            $query->where('perihal', 'like', '%' . $search . '%')
                ->orWhere('nama_pengirim', 'like', '%' . $search . '%')
                ->orWhere('no_registrasi', 'like', '%' . $search . '%')
                ->orWhere('tanggal_surat', 'like', '%' . $search . '%')
                ->orWhere('tanggal_terima', 'like', '%' . $search . '%')
                ->orWhere('alamat_asal', 'like', '%' . $search . '%')
                ->orWhere('alamat_sekarang', 'like', '%' . $search . '%')
                ->orWhere('nama_penerima', 'like', '%' . $search . '%');
        }

        $suratmasuk = $query->get();

        return view('suratmasuk', compact('suratmasuk'));
    }
    public function addSuratMasuk()
    {
        return view('partials.suratMasuk.add');
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

        // nama pengirim dan penerima huruf besar
        $validatedData['nama_pengirim'] = strtoupper($validatedData['nama_pengirim']);
        $validatedData['nama_penerima'] = strtoupper($validatedData['nama_penerima']);

        // alamat asal dan alamat sekarang huruf besar
        $validatedData['alamat_asal'] = strtoupper($validatedData['alamat_asal']);
        $validatedData['alamat_sekarang'] = strtoupper($validatedData['alamat_sekarang']);

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

        if(!$suratmasuk) {
            return redirect()->route('dashboard.surat-masuk')->with('error', 'Surat Masuk Tidak Ditemukan');
        }

        // Mengambil foto berdasarkan suratmasuk id
        $dokumensurat = DokumenSuratMasuk::where('surat_masuk_id', $id)->get();

        return view('partials.suratMasuk.edit', compact('suratmasuk', 'dokumensurat'));
    }
    public function updateSuratMasuk(Request $request, $id)
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

        // nama pengirim dan penerima huruf besar
        $validatedData['nama_pengirim'] = strtoupper($validatedData['nama_pengirim']);
        $validatedData['nama_penerima'] = strtoupper($validatedData['nama_penerima']);

        // alamat asal dan alamat sekarang huruf besar
        $validatedData['alamat_asal'] = strtoupper($validatedData['alamat_asal']);
        $validatedData['alamat_sekarang'] = strtoupper($validatedData['alamat_sekarang']);

        $suratmasuk = suratMasuk::find($id);
        $dokumensurat = DokumenSuratMasuk::where('surat_masuk_id', $id)->get();

        if ($request->hasFile('foto')) {
            // Mencari dokumen foto berdasarkan suratmasuk id lalu di hapus dan menghapus foto di folder public/images/dokumen-foto
            foreach ($dokumensurat as $dokumen) {
                $dokumen->delete();
                unlink(public_path() . $dokumen->path);
            }
            foreach ($request->file('foto') as $file) {
                $nama_file = $file->getClientOriginalName();
                $file->move(public_path() . '/images/dokumen-foto', $nama_file);

                $dokumenSuratMasuk = new DokumenSuratMasuk();
                $dokumenSuratMasuk->surat_masuk_id = $suratmasuk->id;
                $dokumenSuratMasuk->nama_file = $nama_file;
                $dokumenSuratMasuk->path = '/images/dokumen-foto/' . $nama_file;
                $dokumenSuratMasuk->save();
            }
        }

        // Apabila checkbox dicentang maka simpanAgenda bernilai 1, jika tidak maka bernilai 0
        if ($request->has('simpanAgenda')) {
            $validatedData['simpanAgenda'] = 1;
        } else {
            $validatedData['simpanAgenda'] = 0;
        }

        $suratmasuk->perihal = $validatedData['perihal'];
        $suratmasuk->nama_pengirim = $validatedData['nama_pengirim'];
        $suratmasuk->no_registrasi = $validatedData['nomor_registrasi'];
        $suratmasuk->tanggal_surat = $validatedData['tanggal_surat'];
        $suratmasuk->tanggal_terima = $validatedData['tanggal_diterima'];
        $suratmasuk->lampiran = $validatedData['lampiran'];
        $suratmasuk->alamat_asal = $validatedData['alamat_asal'];
        $suratmasuk->alamat_sekarang = $validatedData['alamat_sekarang'];
        $suratmasuk->nama_penerima = $validatedData['nama_penerima'];
        $suratmasuk->is_rapat = $validatedData['simpanAgenda'];
        $suratmasuk->save();

        return redirect()->route('dashboard.surat-masuk')->with('success', 'Surat Masuk Berhasil Diubah');
    }
    public function deleteSuratMasuk($id)
    {
        $suratmasuk = suratMasuk::find($id);
        $dokumensurat = DokumenSuratMasuk::where('surat_masuk_id', $id)->get();

        if(!$suratmasuk) {
            return redirect()->route('dashboard.surat-masuk')->with('error', 'Surat Masuk Tidak Ditemukan');
        }

        // Mencari dokumen foto berdasarkan suratmasuk id lalu di hapus dan menghapus foto di folder public/images/dokumen-foto
        foreach ($dokumensurat as $dokumen) {
            $dokumen->delete();
            unlink(public_path() . $dokumen->path);
        }

        $suratmasuk->delete();

        return redirect()->route('dashboard.surat-masuk')->with('success', 'Surat Masuk Berhasil Dihapus');
    }

    public function addDisposisi()
    {
        return view('partials.disposisi.adddev');
    }
}
