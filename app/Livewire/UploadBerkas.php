<?php

namespace App\Livewire;

use App\Models\LogStatus;
use App\Models\Pendaftaran;
use App\Models\RefBerkas;
use App\Models\UploadBerkas as ModelsUploadBerkas;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithFileUploads;

class UploadBerkas extends Component
{
    public $formBerkas = [];
    public $files = [];
    public $existingBerkas;


    use WithFileUploads;

    #[Computed()]
    public function berkas()
    {
        return RefBerkas::all();
    }
    public function pendaftaran()
    {
        return Pendaftaran::where('id_user', auth()->user()->id_user)->first();
    }

    public function mount()
    {
        $pendaftaran = $this->pendaftaran();

        // Cek apakah pendaftaran null
        if (is_null($pendaftaran)) {
            // Jika pendaftaran null, redirect ke route sebelumnya
            session()->flash('error', 'Anda belum mengisi form pendaftaran.');
            return redirect()->route('dashboard-pendaftaran'); // Redirect ke route sebelumnya
        }

        // Jika id_pendaftaran tidak null, lanjutkan
        $this->existingBerkas = ModelsUploadBerkas::where('id_pendaftaran', $pendaftaran->id_pendaftaran)->get();
        $this->formBerkas = RefBerkas::all();
    }

    public function getBerkas($index)
    {
        return $this->existingBerkas[$index]->berkas ?? null;
    }

    public function save($index)
    {
        $this->validate([
            'files.' . $index => 'required|file|mimes:jpg,jpeg,png|max:1024', // 1MB Max
        ]);

        if (!file_exists(storage_path('app/public/berkas'))) {
            mkdir(storage_path('app/public/berkas'), 0777, true);
        }

        $pathName = 'berkas_' . auth()->user()->id_user . '_' .  $this->formBerkas[$index]->nama_berkas . '.' . $this->files[$index]->getClientOriginalExtension();
        $this->files[$index]->storeAs('public/berkas', $pathName, ['overwrite' => true]);


        $pendaftaran = $this->pendaftaran();
        if (!$pendaftaran) {
            // Tindakan jika pendaftaran tidak ditemukan
            session()->flash("error_{$index}", 'Pendaftaran tidak ditemukan, silahkan lengkapi data pendaftaran terlebih dahulu.');
            return;
        }

        $existingBerkas = ModelsUploadBerkas::where('id_berkas', $this->formBerkas[$index]->id_berkas)
            ->where('id_pendaftaran', $pendaftaran->id_pendaftaran)
            ->first();

        if ($existingBerkas) {
            $existingBerkas->update([
                'berkas' => $pathName,
            ]);
            session()->flash('success', 'Berkas berhasil diupdate.');
            return;
        } else {
            ModelsUploadBerkas::create([
                'id_berkas' => $this->formBerkas[$index]->id_berkas,
                'id_pendaftaran' => $pendaftaran->id_pendaftaran,
                'berkas' => $pathName,
            ]);

            LogStatus::create([
                'aktivitas' => 'Upload Berkas',
                'id_entitas' => auth()->user()->id_user,
                'status' => 'Menunggu Verifikasi',
                'id_admin' => null,
                'keterangan' => null,
            ]);

            session()->flash("success_{$index}", 'File berhasil diupload.');
        }
        $this->emit('changed');
    }

    public function render()
    {
        return view('livewire.upload-berkas', [
            'berkas' => $this->formBerkas,
        ]);
    }
}
