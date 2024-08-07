<?php

namespace App\Livewire;

use App\Models\LogStatus;
use App\Models\Pembayaran;
use App\Models\RefMetodePembayaran;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPembayaran extends Component
{

    use WithFileUploads;


    public $formFile;


    #[Computed()]
    public function metodes()
    {
        return RefMetodePembayaran::all();
    }

    public $existingFile;
    public $metodeID;
    public $metodes;
    public $nama_rekening_pengirim;
    public $isEdit = false; // Menandakan apakah operasi adalah "edit" atau "create"
    public $id_pembayaran;
    public $isVerified = false;

    public function mount()
    {
        // Mengambil satu entri pembayaran yang ada untuk pengguna yang sudah login
        $this->existingFile = Pembayaran::where('id_user', auth()->user()->id_user)->first(); // Ambil hanya satu record
        $this->metodes = RefMetodePembayaran::all(); // Ambil metode pembayaran

        // Cek apakah ada file yang sudah terverifikasi
        if ($this->existingFile) { // Memeriksa apakah $existingFile ada (tidak null)
            $this->isVerified = $this->existingFile->status === 'Terverifikasi';
            if (!$this->isVerified) {
                $this->metodeID = $this->existingFile->id_metode_pembayaran; // Set metodeID dengan id_metode_pembayaran dari file yang ada
            }
            $this->nama_rekening_pengirim = $this->existingFile->nama_rekening_pengirim;
        } else {
            // Default jika tidak ada file
            $this->isVerified = false;
        }
    }

    // Akses file dari koleksi dalam metode atau view
    public function getBuktiPembayaran($index)
    {
        return $this->existingFile[$index]->bukti_pembayaran ?? null;
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'metodeID' => 'required',
            'formFile' => 'nullable|mimes:jpeg,png,jpg|max:1024',
        ]);
    }

    public function store()
    {
        if ($this->isVerified) {
            return; // Tidak melakukan apa-apa jika sudah terverifikasi
        }

        // Validasi input
        $this->validate([
            'metodeID' => 'required',
            'formFile' => 'required|mimes:jpeg,png,jpg|max:1024',
            'nama_rekening_pengirim' => 'required|string|max:50'
        ]);

        if (!file_exists(storage_path('app/public/buktibayar'))) {
            mkdir(storage_path('app/public/buktibayar'), 0777, true);
        }

        // Menyimpan file ke direktori yang diinginkan
        $extension = $this->formFile->getClientOriginalExtension();
        $imageName = 'buktibayar_' . auth()->user()->id_user . '.' . $extension;
        $this->formFile->storeAs('public/buktibayar', $imageName, ['overwrite' => true]);

        // Cari data pembayaran yang sudah ada
        $existingPayment = Pembayaran::where('id_user', auth()->user()->id_user)->first();

        if ($existingPayment) {
            // Jika data pembayaran sudah ada, perbarui data
            $existingPayment->update([
                'id_metode_pembayaran' => $this->metodeID,
                'bukti_pembayaran' => $imageName,
                'nama_rekening_pengirim' => $this->nama_rekening_pengirim,
                'status' => 'Menunggu Verifikasi',
            ]);

            session()->flash('success', 'Bukti Pembayaran Berhasil DiUpdate');
        } else {
            // Jika data pembayaran belum ada, buat data baru
            Pembayaran::create([
                'id_metode_pembayaran' => $this->metodeID,
                'id_user' => auth()->user()->id_user,
                'bukti_pembayaran' => $imageName,
                'nama_rekening_pengirim' => $this->nama_rekening_pengirim,
                'status' => 'Menunggu Verifikasi',
            ]);

            LogStatus::create([
                'aktivitas' => 'Pembayaran',
                'id_entitas' => auth()->user()->id_user,
                'status' => 'Menunggu Verifikasi',
                'id_admin' => null,
                'keterangan' => null,

            ]);

            session()->flash('success', 'Bukti Pembayaran Berhasil Diupload');
        }
    }




    public function render()
    {
        return view('livewire.upload-pembayaran');
    }
}
