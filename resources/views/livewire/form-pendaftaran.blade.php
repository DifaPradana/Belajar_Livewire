<div>
    <h5 class="card-title fw-semibold mb-4">Silahkan isi dokumen pendaftaran</h5>
    <form wire:submit.prevent="save">
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama lengkap</label>
            <input wire:model="nama" type="text" class="form-control" id="nama_lengkap" aria-describedby="namaHelp">
            @error('nama')
                <div id="namaHelp" class="form-text" style="color:red">Isi dengan nama lengkap anda sesuai ijazah.</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input wire:model="nisn" type="number" class="form-control" id="nisn" aria-describedby="NISNHelp">
            <div id="NISNHelp" class="form-text">Isi dengan Nomer Induk Siswa Nasional anda.</div>
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input wire:model="nik" type="number" class="form-control" id="nik" aria-describedby="NIKHelp">
            <div id="NIKHelp" class="form-text">Isi dengan Nomer Induk Kependudukan anda.</div>
        </div>
        <div class="mb-3">
            <label for="inputJenisKelamin" class="form-label">Jenis Kelamin</label>
            <select wire:model="jenisKelaminID" class="form-select" id="inputJenisKelamin"
                aria-label="Default select example">
                <option value="" selected>Jenis Kelamin</option>
                @foreach ($this->jenisKelamins as $jenis_kelamin)
                    <option value="{{ $jenis_kelamin->id_jenis_kelamin }}">{{ $jenis_kelamin->nama_jenis_kelamin }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="inputTempatLahir" class="form-label">Tempat Lahir</label>
            <input wire:model="tempatLahir" type="text" class="form-control" id="inputTempatLahir"
                aria-describedby="TempatLahirHelp">
            <div id="TempatLahirHelp" class="form-text">Isi dengan Nomer Induk Kependudukan anda.</div>
        </div>
        <div class="mb-3">
            <label for="inputTempatLahir" class="form-label">Tanggal Lahir</label>
            <input wire:model="tanggalLahir" type="date" class="form-control" id="inputTempatLahir"
                onclick="this.showPicker();" min="2000-01-01" max="2024-12-31" aria-describedby="TempatLahirHelp">
            <div id="TempatLahirHelp" class="form-text">Isi dengan Nomer Induk Kependudukan anda.</div>
        </div>
        <div class="mb-3">
            <label for="inputAgama" class="form-label">Agama</label>
            <select wire:model="agamaID" class="form-select" id="inputAgama" aria-label="Default select example">
                <option value="" selected>Pilih Agama</option>
                @foreach ($this->agamas as $agama)
                    <option value="{{ $agama->id_agama }}">{{ $agama->nama_agama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="inputDomisili" class="form-label">Domisili</label>
            <input wire:model="domisili" type="text" class="form-control" id="inputDomisili"
                aria-describedby="DomisiliHelp">
        </div>
        <div class="mb-3">
            <label for="inputNoWhatsapp" class="form-label">No Whatsapp</label>
            <input wire:model="no_wa" type="number" class="form-control" id="inputNoWhatsapp"
                aria-describedby="NoWhatsappHelp" min="0">
            <div id="NoWhatsappHelp" class="form-text">Isi dengan Nomer Induk Kependudukan anda.</div>
        </div>
        <div class="mb-3">
            <label for="inputNamaIbuKandung" class="form-label">Nama Ibu kandung</label>
            <input wire:model="namaOrangTua" type="text" class="form-control" id="inputNamaIbuKandung"
                aria-describedby="namaIbuKandungHelp">
            <div id="namaIbuKandungHelp" class="form-text">Isi dengan nama lengkap anda sesuai ijazah.</div>
        </div>
        <div class="mb-3">
            <label for="inputNoWhatsappOrangTua" class="form-label">No Whatsapp Orang Tua</label>
            <input wire:model="noWaOrangTua" type="number" class="form-control" id="inputNoWhatsappOrangTua"
                aria-describedby="NoWhatsappOrangTuaHelp" min="0">
            <div id="NoWhatsappOrangTuaHelp" class="form-text">Isi dengan Nomer Induk Kependudukan anda.</div>
        </div>
        <div class="mb-3">
            <label for="inputPenghasilanOrangTua" class="form-label">Penghasilan Orang Tua</label>
            <select wire:model="PenghasilanOrangTuaID" class="form-select" id="inputPenghasilanOrangTua"
                aria-label="Default select example">
                <option value="" selected>Penghasilan Orang Tua</option>
                @foreach ($this->penghasilanOrangTuas as $penghasilanOrangTua)
                    <option value="{{ $penghasilanOrangTua->id_penghasilan_orang_tua }}">
                        {{ $penghasilanOrangTua->jumlah_penghasilan_orang_tua }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="inputAsalSekolah" class="form-label">Asal Sekolah</label>
            <input wire:model="asalSekolah" type="text" class="form-control" id="inputAsalSekolah"
                aria-describedby="AsalSekolahHelp">
            <div id="AsalSekolahHelp" class="form-text">Isi dengan nama lengkap anda sesuai ijazah.</div>
        </div>

        <div class="mb-3">
            <label for="inputProgramStudi" class="form-label">Program Studi yang diinginkan</label>
            <select wire:model="programStudiID" class="form-select" id="inputProgramStudi"
                aria-label="Default select example" value="">
                <option value="" value="" selected>Pilih program studi</option>
                @foreach ($this->programStudis as $programStudi)
                    <option value="{{ $programStudi->id_program_studi }}">{{ $programStudi->nama_program_studi }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="inputJalurPendaftaran" class="form-label">Jalur Pendaftaran</label>
            <ol>
                <li>Jalur beasiswa santri & tahfidz ditujukan untuk penghafal
                    Al-Qur'an minimal 1 juz dibuktikan dengan syahadah atau
                    bukti
                    mukim / ijazah santri / kartu tanda santri.</li>
                <li>Jalur beasiswa kurang mampu berprestasi ditujukan untuk
                    calon
                    mahasiswa bukan santri dan memiliki prestasi dibuktikan
                    dengan
                    sertifikat.</li>
                <li>Jalur beasiswa KIP (Kartu Indonesia Pintar) ditujukan untuk
                    calon mahasiswa yang memilki kartu indonesia pintar. </li>
            </ol>
            <select wire:model="JalurPendaftaranID" class="form-select" id="inputJalurPendaftaran"
                aria-label="Default select example">
                <option value="" selected>Jalur Pendaftaran</option>
                @foreach ($this->jalurPendafatarans as $jalurPendaftaran)
                    <option value="{{ $jalurPendaftaran->id_jalur_pendaftaran }}">
                        {{ $jalurPendaftaran->nama_jalur_pendaftaran }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="inputSumberInformasi" class="form-label">Sumber Informasi</label>
            <select wire:model="SumberInformasiID" class="form-select" id="inputSumberInformasi"
                aria-label="Default select example">
                <option value="" selected>Sumber Informasi</option>
                @foreach ($this->sumberInformasis as $sumberInformasi)
                    <option value="{{ $sumberInformasi->id_sumber_informasi }}">
                        {{ $sumberInformasi->nama_sumber_informasi }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="inputRencanaTempatTinggal" class="form-label">Rencana Tempat Tinggal</label>
            <select wire:model="RencanaTempatTinggalID" class="form-select" id="inputRencanaTempatTinggal"
                aria-label="Default select example">
                <option value="" selected>Rencana Tempat Tinggal</option>
                @foreach ($this->rencanaTempatTinggals as $rencanaTempatTinggal)
                    <option value="{{ $rencanaTempatTinggal->id_rencana_tempat_tinggal }}">
                        {{ $rencanaTempatTinggal->nama_rencana_tempat_tinggal }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

        @if (session('success'))
            <div class="card-body p-4">
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endif
    </form>
</div>
