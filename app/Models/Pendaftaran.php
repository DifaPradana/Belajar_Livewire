<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans';
    protected $primaryKey = 'id_pendaftaran';
    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'nik',
        'id_jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'id_agama',
        'domisili',
        'no_whatsapp',
        'nama_orang_tua',
        'no_whatsapp_orang_tua',
        'id_penghasilan_orang_tua',
        'asal_sekolah',
        'id_program_studi',
        'id_sumber_informasi',
        'id_jalur_pendaftaran',
        'id_rencana_tempat_tinggal',
        'id_user',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function jenisKelamin()
    {
        return $this->belongsTo(RefJenisKelamin::class, 'id_jenis_kelamin', 'id_jenis_kelamin');
    }

    public function agama()
    {
        return $this->belongsTo(RefAgama::class, 'id_agama', 'id_agama');
    }

    public function penghasilanOrangTua()
    {
        return $this->belongsTo(RefPenghasilanOrangTua::class, 'id_penghasilan_orang_tua', 'id_penghasilan_orang_tua');
    }

    public function programStudi()
    {
        return $this->belongsTo(RefProgramStudi::class, 'id_program_studi', 'id_program_studi');
    }

    public function sumberInformasi()
    {
        return $this->belongsTo(RefSumberInformasi::class, 'id_sumber_informasi', 'id_sumber_informasi');
    }

    public function jalurPendaftaran()
    {
        return $this->belongsTo(RefJalurPendaftaran::class, 'id_jalur_pendaftaran', 'id_jalur_pendaftaran');
    }

    public function rencanaTempatTinggal()
    {
        return $this->belongsTo(RefRencanaTempatTinggal::class, 'id_rencana_tempat_tinggal', 'id_rencana_tempat_tinggal');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_pendaftaran', 'id_pendaftaran');
    }

    public function berkas()
    {
        return $this->hasMany(UploadBerkas::class, 'id_pendaftaran', 'id_pendaftaran');
    }
}
