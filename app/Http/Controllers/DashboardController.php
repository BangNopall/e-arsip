<?php

namespace App\Http\Controllers;

use App\Models\disposisi;
use App\Models\dokumenSuratKeluar;
use App\Models\DokumenSuratMasuk;
use App\Models\suratKeluar;
use App\Models\suratMasuk;
use App\Models\suratRegisterKeluar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{

    // ROUTE HOME
    public function dashboard()
    {
        // Mengambil semua data surat masuk dan di count
        $suratMasuk = suratMasuk::all()->count();
        $suratKeluar = suratKeluar::all()->count();
        $suratRegisterKeluar = suratRegisterKeluar::all()->count();

        // mengambil semua data surat masuk dan surat keluar yang is_rapat bernilai 1 dan di count
        $suratMasukRapat = suratMasuk::where('is_rapat', 1)->count();
        $suratKeluarRapat = suratKeluar::where('is_rapat', 1)->count();
        $totalsuratRapat = $suratMasukRapat + $suratKeluarRapat;

        return view('dashboard', compact('suratMasuk', 'suratKeluar', 'suratRegisterKeluar', 'totalsuratRapat'));
    }
    public function editProfil()
    {
        // Mengambil data user jika login
        $user = auth()->user();
        return view('auth.editProfil', compact('user'));
    }
    public function updateProfil(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'name' => 'required',
            'jabatan' => 'required',
            'email' => 'required|unique:users,email,' . $user->id . '|email:dns',
            'password' => 'nullable|min:6',
            'passwordconfirm' => 'nullable|min:6',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // jika null maka password tidak diubah
        if (!$validatedData['password'] == null) {
            if ($validatedData['password'] !== $validatedData['passwordconfirm']) {
                return redirect()->back()->withErrors(['passwordconfirm' => 'Password tidak sesuai']);
            }
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            $validatedData['password'] = $user->password;
        }

        // Mengubah foto
        if ($request->hasFile('foto')) {
            // Mencari foto lama lalu di hapus dan menghapus foto di folder public/images/foto
            if ($user->foto) {
                unlink(public_path() . $user->foto);
            }

            $foto = $request->file('foto');
            $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path() . '/images/profil/', $nama_foto);
            $user->foto = '/images/profil/' . $nama_foto;
        }

        // Mengubah data user
        $user->name = $validatedData['name'];
        $user->jabatan = $validatedData['jabatan'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->save();

        return redirect()->route('dashboard.edit-profil')->with('success', 'Profil Berhasil Diubah');
    }

    // ROUTE SURAT MASUK
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
            'dok.*' => 'required|mimes:pdf,word,docx,doc,xlsx,xls,ppt,pptx,txt',
            'nama_penerima' => 'required',
        ]);

        // nama pengirim dan penerima huruf besar
        $validatedData['nama_pengirim'] = strtoupper($validatedData['nama_pengirim']);
        $validatedData['nama_penerima'] = strtoupper($validatedData['nama_penerima']);

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

        // simpan dokumen ke dalam tabel dokumen_surat_masuk
        if ($request->hasFile('dok')) {
            foreach ($request->file('dok') as $file) {
                $nama_file = $file->getClientOriginalName();
                $file->move(public_path() . '/dokumen/', $nama_file);

                $dokumenSuratMasuk = new DokumenSuratMasuk();
                $dokumenSuratMasuk->surat_masuk_id = $suratMasuk->id;
                $dokumenSuratMasuk->nama_file = $nama_file;
                $dokumenSuratMasuk->path = '/dokumen/' . $nama_file;
                $dokumenSuratMasuk->save();
            }
        }

        return redirect()->route('dashboard.surat-masuk')->with('success', 'Surat Masuk Berhasil Ditambahkan');
    }
    public function editSuratMasuk($id)
    {
        $suratmasuk = suratMasuk::find($id);

        if (!$suratmasuk) {
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
            'dok.*' => 'required|mimes:pdf,word,docx,doc,xlsx,xls,ppt,pptx,txt',
            'nama_penerima' => 'required',
        ]);

        // nama pengirim dan penerima huruf besar
        $validatedData['nama_pengirim'] = strtoupper($validatedData['nama_pengirim']);
        $validatedData['nama_penerima'] = strtoupper($validatedData['nama_penerima']);

        $suratmasuk = suratMasuk::find($id);
        $dokumensurat = DokumenSuratMasuk::where('surat_masuk_id', $id)->get();

        if ($request->hasFile('dok')) {
            // Mencari dokumen foto berdasarkan suratmasuk id lalu di hapus dan menghapus foto di folder public/images/dokumen-foto
            foreach ($dokumensurat as $dokumen) {
                $dokumen->delete();
                unlink(public_path() . $dokumen->path);
            }
            foreach ($request->file('dok') as $file) {
                $nama_file = $file->getClientOriginalName();
                $file->move(public_path() . '/dokumen/', $nama_file);

                $dokumenSuratMasuk = new DokumenSuratMasuk();
                $dokumenSuratMasuk->surat_masuk_id = $suratmasuk->id;
                $dokumenSuratMasuk->nama_file = $nama_file;
                $dokumenSuratMasuk->path = '/dokumen/' . $nama_file;
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

        if (!$suratmasuk) {
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

    // ROUTE DISPOSISI
    public function addDisposisi()
    {
        return view('partials.disposisi.add');
    }
    public function storeDisposisi(Request $request)
    {
        // $validatedData = $request->validate([
        //     'nomor_surat' => 'required|numeric',
        //     'tanggal_surat' => 'required',
        //     'tanggal_terima' => 'required',
        //     'asal_surat' => 'required',
        //     'isi_ringkasan_surat' => 'required',
        //     'diteruskan_kepada' => 'required',
        //     'nomor_agenda' => 'required|numeric',
        //     'tanggal_penyelesaian' => 'required',
        // ]);

        // mengambil semua request dari form dan memasukkan ke dalam pdf
        $disposisi = $request->all();

        // Mencetak data disposisi ke dalam file pdf
        $pdf = Pdf::loadView('partials.disposisi.print', compact('disposisi'));
        return $pdf->download('disposisi.pdf');
    }

    // ROUTE SURAT KELUAR
    public function suratKeluar(Request $request)
    {
        $search = $request->input('search');
        $query = suratKeluar::query();

        if ($search) {
            // Menambahkan kondisi pencarian ke query
            $query->where('nomor_surat', 'like', '%' . $search . '%')
                ->orWhere('nama_pengirim', 'like', '%' . $search . '%')
                ->orWhere('tanggal_surat', 'like', '%' . $search . '%')
                ->orWhere('nama_penerima', 'like', '%' . $search . '%')
                ->orWhere('isi_surat', 'like', '%' . $search . '%');
        }

        $suratkeluar = $query->get();

        return view('suratkeluar', compact('suratkeluar'));
    }
    public function addSuratKeluar()
    {
        return view('partials.suratKeluar.add');
    }
    public function storeSuratKeluar(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_surat' => 'required|numeric',
            'tanggal_surat' => 'required',
            'nama_pengirim' => 'required',
            'nama_penerima' => 'required',
            'isi_surat' => 'required',
            'penanggungjawab' => 'required',
            'dok.*' => 'required|mimes:pdf,word,docx,doc,xlsx,xls,ppt,pptx,txt',
        ]);

        // nama pengirim dan penerima huruf besar
        $validatedData['nama_pengirim'] = strtoupper($validatedData['nama_pengirim']);
        $validatedData['nama_penerima'] = strtoupper($validatedData['nama_penerima']);
        $validatedData['penanggungjawab'] = strtoupper($validatedData['penanggungjawab']);

        if ($request->has('simpanAgenda')) {
            $validatedData['simpanAgenda'] = 1;
        } else {
            $validatedData['simpanAgenda'] = 0;
        }

        $suratkeluar = new suratKeluar();
        $suratkeluar->nomor_surat = $validatedData['nomor_surat'];
        $suratkeluar->tanggal_surat = $validatedData['tanggal_surat'];
        $suratkeluar->nama_pengirim = $validatedData['nama_pengirim'];
        $suratkeluar->nama_penerima = $validatedData['nama_penerima'];
        $suratkeluar->isi_surat = $validatedData['isi_surat'];
        $suratkeluar->penanggungjawab = $validatedData['penanggungjawab'];
        $suratkeluar->is_rapat = $validatedData['simpanAgenda'];
        $suratkeluar->save();

        // simpan foto ke dalam tabel dokumen_surat_masuk
        if ($request->hasFile('dok')) {
            foreach ($request->file('dok') as $file) {
                $nama_file = $file->getClientOriginalName();
                $file->move(public_path() . '/dokumen/', $nama_file);

                $dokumenSuratKeluar = new dokumenSuratKeluar();
                $dokumenSuratKeluar->surat_keluar_id = $suratkeluar->id;
                $dokumenSuratKeluar->nama_file = $nama_file;
                $dokumenSuratKeluar->path = '/dokumen/' . $nama_file;
                $dokumenSuratKeluar->save();
            }
        }

        return redirect()->route('dashboard.surat-keluar')->with('success', 'Surat Kelar Berhasil Ditambahkan');
    }
    public function editSuratKeluar($id)
    {
        $suratkeluar = suratKeluar::find($id);

        if (!$suratkeluar) {
            return redirect()->route('dashboard.surat-keluar')->with('error', 'Surat Keluar Tidak Ditemukan');
        }

        // Mengambil foto berdasarkan suratmasuk id
        $dokumensurat = dokumenSuratKeluar::where('surat_keluar_id', $id)->get();

        return view('partials.suratKeluar.edit', compact('suratkeluar', 'dokumensurat'));
    }
    public function updateSuratKeluar(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomor_surat' => 'required|numeric',
            'tanggal_surat' => 'required',
            'nama_pengirim' => 'required',
            'nama_penerima' => 'required',
            'isi_surat' => 'required',
            'penanggungjawab' => 'required',
            'dok.*' => 'required|mimes:pdf,word,docx,doc,xlsx,xls,ppt,pptx,txt',
        ]);

        // nama pengirim dan penerima huruf besar
        $validatedData['nama_pengirim'] = strtoupper($validatedData['nama_pengirim']);
        $validatedData['nama_penerima'] = strtoupper($validatedData['nama_penerima']);
        $validatedData['penanggungjawab'] = strtoupper($validatedData['penanggungjawab']);

        $suratkeluar = suratKeluar::find($id);
        $dokumensurat = dokumenSuratKeluar::where('surat_keluar_id', $id)->get();

        if ($request->hasFile('dok')) {
            // Mencari dokumen foto berdasarkan suratmasuk id lalu di hapus dan menghapus foto di folder public/images/dokumen-foto
            foreach ($dokumensurat as $dokumen) {
                $dokumen->delete();
                unlink(public_path() . $dokumen->path);
            }
            foreach ($request->file('dok') as $file) {
                $nama_file = $file->getClientOriginalName();
                $file->move(public_path() . '/dokumen/', $nama_file);

                $dokumenSuratKeluar = new dokumenSuratKeluar();
                $dokumenSuratKeluar->surat_keluar_id = $suratkeluar->id;
                $dokumenSuratKeluar->nama_file = $nama_file;
                $dokumenSuratKeluar->path = '/dokumen/' . $nama_file;
                $dokumenSuratKeluar->save();
            }
        }

        if ($request->has('simpanAgenda')) {
            $validatedData['simpanAgenda'] = 1;
        } else {
            $validatedData['simpanAgenda'] = 0;
        }

        $suratkeluar->nomor_surat = $validatedData['nomor_surat'];
        $suratkeluar->tanggal_surat = $validatedData['tanggal_surat'];
        $suratkeluar->nama_pengirim = $validatedData['nama_pengirim'];
        $suratkeluar->nama_penerima = $validatedData['nama_penerima'];
        $suratkeluar->isi_surat = $validatedData['isi_surat'];
        $suratkeluar->penanggungjawab = $validatedData['penanggungjawab'];
        $suratkeluar->is_rapat = $validatedData['simpanAgenda'];
        $suratkeluar->save();

        return redirect()->route('dashboard.surat-keluar')->with('success', 'Surat Keluar Berhasil Diubah');
    }
    public function deleteSuratKeluar($id)
    {
        $suratkeluar = suratKeluar::find($id);
        $dokumensurat = dokumenSuratKeluar::where('surat_keluar_id', $id)->get();

        if (!$suratkeluar) {
            return redirect()->route('dashboard.surat-keluar')->with('error', 'Surat Keluar Tidak Ditemukan');
        }

        // Mencari dokumen foto berdasarkan suratmasuk id lalu di hapus dan menghapus foto di folder public/images/dokumen-foto
        foreach ($dokumensurat as $dokumen) {
            $dokumen->delete();
            unlink(public_path() . $dokumen->path);
        }

        $suratkeluar->delete();

        return redirect()->route('dashboard.surat-keluar')->with('success', 'Surat Keluar Berhasil Dihapus');
    }

    // ROUTE SURAT REGISTER KELUAR
    public function suratRegisterKeluar(Request $request)
    {
        $search = $request->input('search');
        $query = suratRegisterKeluar::query();

        if ($search) {
            // Menambahkan kondisi pencarian ke query
            $query->where('nama_lengkap', 'like', '%' . $search . '%')
                ->orWhere('nik', 'like', '%' . $search . '%')
                ->orWhere('tanggal_lahir', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhere('jenis_kelamin', 'like', '%' . $search . '%')
                ->orWhere('pekerjaan', 'like', '%' . $search . '%')
                ->orWhere('alamat_asal', 'like', '%' . $search . '%')
                ->orWhere('alamat_pindah', 'like', '%' . $search . '%')
                ->orWhere('tanggal_surat', 'like', '%' . $search . '%')
                ->orWhere('keterangan', 'like', '%' . $search . '%')
                ->orWhere('penanggung_jawab', 'like', '%' . $search . '%');
        }

        $suratregisterkeluar = $query->get();

        return view('suratregisterkeluar', compact('suratregisterkeluar'));
    }
    public function addSuratRegisterKeluar()
    {
        return view('partials.suratRegisterKeluar.add');
    }
    public function storeSuratRegisterKeluar(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|numeric',
            'tanggal_lahir' => 'required',
            'status' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'alamat_asal' => 'required',
            'alamat_pindah' => 'required',
            'tanggal_surat' => 'required',
            'keterangan' => 'required',
            'penanggung_jawab' => 'required',
        ]);

        // nama lengkap huruf besar
        $validatedData['nama_lengkap'] = strtoupper($validatedData['nama_lengkap']);
        $validatedData['penanggung_jawab'] = strtoupper($validatedData['penanggung_jawab']);

        $suratregisterkeluar = new suratRegisterKeluar();
        $suratregisterkeluar->nama_lengkap = $validatedData['nama_lengkap'];
        $suratregisterkeluar->nik = $validatedData['nik'];
        $suratregisterkeluar->tanggal_lahir = $validatedData['tanggal_lahir'];
        $suratregisterkeluar->status = $validatedData['status'];
        $suratregisterkeluar->jenis_kelamin = $validatedData['jenis_kelamin'];
        $suratregisterkeluar->pekerjaan = $validatedData['pekerjaan'];
        $suratregisterkeluar->alamat_asal = $validatedData['alamat_asal'];
        $suratregisterkeluar->alamat_pindah = $validatedData['alamat_pindah'];
        $suratregisterkeluar->tanggal_surat = $validatedData['tanggal_surat'];
        $suratregisterkeluar->keterangan = $validatedData['keterangan'];
        $suratregisterkeluar->penanggung_jawab = $validatedData['penanggung_jawab'];
        $suratregisterkeluar->save();

        return redirect()->route('dashboard.surat-register-keluar')->with('success', 'Surat Register Keluar Berhasil Ditambahkan');
    }
    public function editSuratRegisterKeluar($id)
    {
        $suratregisterkeluar = suratRegisterKeluar::find($id);

        if (!$suratregisterkeluar) {
            return redirect()->route('dashboard.surat-register-keluar')->with('error', 'Surat Register Keluar Tidak Ditemukan');
        }

        return view('partials.suratRegisterKeluar.edit', compact('suratregisterkeluar'));
    }
    public function updateSuratRegisterKeluar(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|numeric',
            'tanggal_lahir' => 'required',
            'status' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'alamat_asal' => 'required',
            'alamat_pindah' => 'required',
            'tanggal_surat' => 'required',
            'keterangan' => 'required',
            'penanggung_jawab' => 'required',
        ]);

        $validatedData['nama_lengkap'] = strtoupper($validatedData['nama_lengkap']);
        $validatedData['penanggung_jawab'] = strtoupper($validatedData['penanggung_jawab']);

        $suratregisterkeluar = suratRegisterKeluar::find($id);

        $suratregisterkeluar->nama_lengkap = $validatedData['nama_lengkap'];
        $suratregisterkeluar->nik = $validatedData['nik'];
        $suratregisterkeluar->tanggal_lahir = $validatedData['tanggal_lahir'];
        $suratregisterkeluar->status = $validatedData['status'];
        $suratregisterkeluar->jenis_kelamin = $validatedData['jenis_kelamin'];
        $suratregisterkeluar->pekerjaan = $validatedData['pekerjaan'];
        $suratregisterkeluar->alamat_asal = $validatedData['alamat_asal'];
        $suratregisterkeluar->alamat_pindah = $validatedData['alamat_pindah'];
        $suratregisterkeluar->tanggal_surat = $validatedData['tanggal_surat'];
        $suratregisterkeluar->keterangan = $validatedData['keterangan'];
        $suratregisterkeluar->penanggung_jawab = $validatedData['penanggung_jawab'];
        $suratregisterkeluar->save();

        return redirect()->route('dashboard.surat-register-keluar')->with('success', 'Surat Register Keluar Berhasil Diubah');
    }
    public function deleteSuratRegisterKeluar($id)
    {
        $suratregisterkeluar = suratRegisterKeluar::find($id);

        if (!$suratregisterkeluar) {
            return redirect()->route('dashboard.surat-register-keluar')->with('error', 'Surat Register Keluar Tidak Ditemukan');
        }

        $suratregisterkeluar->delete();

        return redirect()->route('dashboard.surat-register-keluar')->with('success', 'Surat Register Keluar Berhasil Dihapus');
    }

    // ROUTE BUKU AGENDA
    public function bukuAgenda(Request $request)
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
                ->orWhere('nama_penerima', 'like', '%' . $search . '%')
                // menambahkan kondisi pencarian ke tabel surat keluar
                ->orWhere('nomor_surat', 'like', '%' . $search . '%')
                ->orWhere('nama_pengirim', 'like', '%' . $search . '%')
                ->orWhere('tanggal_surat', 'like', '%' . $search . '%')
                ->orWhere('nama_penerima', 'like', '%' . $search . '%')
                ->orWhere('isi_surat', 'like', '%' . $search . '%')
                ->orWhere('penanggungjawab', 'like', '%' . $search . '%');
        }
        $suratmasuk = $query->get();
        $suratkeluar = suratKeluar::all();

        return view('bukuagenda', compact('suratmasuk', 'suratkeluar'));
    }
    public function bukuAgendaCetak(Request $request)
    {
        $tanggalAwal = $request->input('tanggalawal');
        $tanggalAkhir = $request->input('tanggalakhir');

        // Mengambil data berdasarkan created_at tetapi hanya tanggalnya saja

        $datasm = suratMasuk::whereDate('created_at', '>=', $tanggalAwal)
            ->whereDate('created_at', '<=', $tanggalAkhir)
            ->where('is_rapat', 1)
            ->get();

        $datask = suratKeluar::whereDate('created_at', '>=', $tanggalAwal)
            ->whereDate('created_at', '<=', $tanggalAkhir)
            ->where('is_rapat', 1)
            ->get();

        $pdf = Pdf::loadView('partials.bukuAgenda.print', compact('datasm', 'datask', 'tanggalAwal', 'tanggalAkhir'));
        return $pdf->download('buku-agenda.pdf');
    }
}
