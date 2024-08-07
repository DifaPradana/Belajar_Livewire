<?php

namespace App\Livewire;

use App\Models\LogStatus;
use App\Models\Pendaftaran;
use App\Models\RefAgama;
use App\Models\RefJalurPendaftaran;
use App\Models\RefJenisKelamin;
use App\Models\RefPenghasilanOrangTua;
use App\Models\RefProgramStudi;
use App\Models\RefRencanaTempatTinggal;
use App\Models\RefSumberInformasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Computed;
use Livewire\Component;

class FormPendaftaran extends Component
{
    public $programStudis;
    public $agamas;
    public $penghasilanOrangTuas;
    public $jenisKelamins;
    public $jalurPendafatarans;
    public $sumberInformasis;
    public $rencanaTempatTinggals;


    public $nama;
    public $nisn;
    public $nik;
    public $jenisKelaminID;
    public $tempatLahir;
    public $tanggalLahir;
    public $agamaID;
    public $domisili;
    public $no_wa;
    public $namaOrangTua;
    public $noWaOrangTua;
    public $asalSekolah;
    public $PenghasilanOrangTuaID;
    public $programStudiID;
    public $JalurPendaftaranID;
    public $SumberInformasiID;
    public $RencanaTempatTinggalID;

    public $existingPendaftaran;


    #[Computed()]
    public function jenisKelamins()
    {
        return RefJenisKelamin::all();
    }

    #[Computed()]
    public function penghasilanOrangTuas()
    {
        return RefPenghasilanOrangTua::all();
    }

    #[Computed()]
    public function agamas()
    {
        return RefAgama::all();
    }

    #[Computed()]
    public function programStudis()
    {
        return RefProgramStudi::all();
    }

    #[Computed()]
    public function jalurPendafatarans()
    {
        return RefJalurPendaftaran::all();
    }

    #[Computed()]
    public function sumberInformasis()
    {
        return RefSumberInformasi::all();
    }

    #[Computed()]
    public function rencanaTempatTinggals()
    {
        return RefRencanaTempatTinggal::all();
    }



    public function mount()
    {
        $this->programStudis = RefProgramStudi::all();
        $this->agamas = RefAgama::all();
        $this->penghasilanOrangTuas = RefPenghasilanOrangTua::all();
        $this->jenisKelamins = RefJenisKelamin::all();
        $this->jalurPendafatarans = RefJalurPendaftaran::all();
        $this->sumberInformasis = RefSumberInformasi::all();
        $this->rencanaTempatTinggals = RefRencanaTempatTinggal::all();

        $this->existingPendaftaran = Pendaftaran::where('id_user', auth()->user()->id_user)->first();
        //Mount data yang sudah ada kedalam form
        if ($this->existingPendaftaran) {
            $this->nama = $this->existingPendaftaran->nama_lengkap;
            $this->nisn = $this->existingPendaftaran->nisn;
            $this->nik = $this->existingPendaftaran->nik;
            $this->jenisKelaminID = $this->existingPendaftaran->id_jenis_kelamin;
            $this->tempatLahir = $this->existingPendaftaran->tempat_lahir;
            $this->tanggalLahir = $this->existingPendaftaran->tanggal_lahir;
            $this->agamaID = $this->existingPendaftaran->id_agama;
            $this->domisili = $this->existingPendaftaran->domisili;
            $this->no_wa = $this->existingPendaftaran->no_whatsapp;
            $this->namaOrangTua = $this->existingPendaftaran->nama_orang_tua;
            $this->noWaOrangTua = $this->existingPendaftaran->no_whatsapp_orang_tua;
            $this->asalSekolah = $this->existingPendaftaran->asal_sekolah;
            $this->PenghasilanOrangTuaID = $this->existingPendaftaran->id_penghasilan_orang_tua;
            $this->programStudiID = $this->existingPendaftaran->id_program_studi;
            $this->JalurPendaftaranID = $this->existingPendaftaran->id_jalur_pendaftaran;
            $this->SumberInformasiID = $this->existingPendaftaran->id_sumber_informasi;
            $this->RencanaTempatTinggalID = $this->existingPendaftaran->id_rencana_tempat_tinggal;
        }
    }

    public function save()
    {
        $this->validate(
            [
                'nama' => 'required|string',
                'nisn' => 'required|string',
                'nik' => 'required|string',
                'jenisKelaminID' => 'required|numeric',
                'tempatLahir' => 'required|string',
                'tanggalLahir' => 'required|date',
                'agamaID' => 'required|numeric',
                'domisili' => 'required|string',
                'no_wa' => 'required|string',
                'namaOrangTua' => 'required|string',
                'noWaOrangTua' => 'required|string',
                'asalSekolah' => 'nullable|string',
                'PenghasilanOrangTuaID' => 'required|numeric',
                'programStudiID' => 'required|numeric',
                'JalurPendaftaranID' => 'required|numeric',
                'SumberInformasiID' => 'required|numeric',
                'RencanaTempatTinggalID' => 'required|numeric',
            ]
        );

        $existingPendaftaran = Pendaftaran::where('id_user', auth()->user()->id_user)->first();

        if ($existingPendaftaran) {
            $existingPendaftaran->update([
                'nama_lengkap' => $this->nama,
                'nisn' => $this->nisn,
                'nik' => $this->nik,
                'id_jenis_kelamin' => $this->jenisKelaminID,
                'tempat_lahir' => $this->tempatLahir,
                'tanggal_lahir' => $this->tanggalLahir,
                'id_agama' => $this->agamaID,
                'domisili' => $this->domisili,
                'no_whatsapp' => $this->no_wa,
                'nama_orang_tua' => $this->namaOrangTua,
                'no_whatsapp_orang_tua' => $this->noWaOrangTua,
                'asal_sekolah' => $this->asalSekolah,
                'id_penghasilan_orang_tua' => $this->PenghasilanOrangTuaID,
                'id_program_studi' => $this->programStudiID,
                'id_jalur_pendaftaran' => $this->JalurPendaftaranID,
                'id_sumber_informasi' => $this->SumberInformasiID,
                'id_rencana_tempat_tinggal' => $this->RencanaTempatTinggalID,
            ]);
            session()->flash('success', 'Data Pendaftaran Berhasil DiUpdate');
        } else {
            Pendaftaran::create([
                'nama_lengkap' => $this->nama,
                'id_user' => auth()->user()->id_user,
                'nisn' => $this->nisn,
                'nik' => $this->nik,
                'id_jenis_kelamin' => $this->jenisKelaminID,
                'tempat_lahir' => $this->tempatLahir,
                'tanggal_lahir' => $this->tanggalLahir,
                'id_agama' => $this->agamaID,
                'domisili' => $this->domisili,
                'no_whatsapp' => $this->no_wa,
                'nama_orang_tua' => $this->namaOrangTua,
                'no_whatsapp_orang_tua' => $this->noWaOrangTua,
                'asal_sekolah' => $this->asalSekolah,
                'id_penghasilan_orang_tua' => $this->PenghasilanOrangTuaID,
                'id_program_studi' => $this->programStudiID,
                'id_jalur_pendaftaran' => $this->JalurPendaftaranID,
                'id_sumber_informasi' => $this->SumberInformasiID,
                'id_rencana_tempat_tinggal' => $this->RencanaTempatTinggalID,
            ]);

            LogStatus::create([
                'aktivitas' => 'Pendaftaran',
                'id_entitas' => auth()->user()->id_user,
                'status' => 'Menunggu Verifikasi',
                'id_admin' => null,
                'keterangan' => null,
            ]);

            session()->flash('success', 'Data Pendaftaran Berhasil Diupload');
        }
    }


    public function render()
    {
        return view('livewire.form-pendaftaran');
    }
}
