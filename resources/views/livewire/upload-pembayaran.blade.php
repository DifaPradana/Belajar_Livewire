<div>

    <h5 class="card-title fw-semibold mb-4">Upload Bukti Pembayaran</h5>

    {{-- @dd($existingFile) --}}

    @if ($isVerified)
        <!-- Tampilkan gambar dan metode pembayaran jika sudah terverifikasi -->
        <div>
            <h5>Status :
                @if ($existingFile)
                    <span
                        class="
                        @if ($existingFile->status === 'Menunggu Verifikasi') status-menunggu
                        @elseif ($existingFile->status === 'Terverifikasi')
                            status-terverifikasi
                        @elseif ($existingFile->status === 'Ditolak')
                            status-ditolak @endif
                    ">
                        {{ $existingFile->status }}
                    </span>
                @else
                    Status tidak tersedia
                @endif
            </h5>
            <p>Nama Metode Pembayaran yang Dipilih: {{ $existingFile->metodePembayaran->nama_metode_pembayaran }}</p>


            <p>File yang sudah diunggah:</p>
            @if ($existingFile)
                <div>
                    <div>
                        <img src="{{ asset('storage/buktibayar/' . $existingFile->bukti_pembayaran) }}"
                            style="max-width: 50%; max-height: 50%;">
                    </div>
                </div>
            @endif

        </div>
    @else
        <!-- Tampilkan form jika status belum terverifikasi -->
        <form wire:submit.prevent="store">
            <label for="metode" class="form-label">Metode yang dipilih</label>
            <select wire:model="metodeID" class="form-select" id="metode" aria-label="Default select example">
                <option value="" selected>Metode Pembayaran yang digunakan</option>
                @foreach ($this->metodes as $metode)
                    <option value="{{ $metode->id_metode_pembayaran }}">{{ $metode->nama_metode_pembayaran }}</option>
                @endforeach
            </select>
            <br>

            <div class="mb-3">
                <label for="namaRekeningPengirim" class="form-label">Nama Rekening Pengirim</label>
                <input wire:model="nama_rekening_pengirim" type="text" class="form-control"
                    id="namaRekeningPengirim">
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <br>



            <label for="formFile" class="form-label">Upload Bukti Pembayaran</label>
            <input class="form-control" wire:model="formFile" accept="jpg, png, jpeg" type="file" id="formFile">

            @error('formFile')
                <span class="text-red-500" style="color: red">{{ $message }}</span>
            @enderror

            @if ($formFile)
                <img src="{{ $formFile->temporaryUrl() }}" style="max-width: 200px; max-height: 200px;">
            @endif
            <br>
            <div wire:loading wire:target="formFile" class="spinner-border text-primary me-2" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>



            <br>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
            @if (session('success'))
                <div class="card-body p-4">
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif


            @if ($existingFile)
                <div>
                    <br>
                    <h5>Status :
                        @if ($existingFile)
                            <span
                                class="
                                @if ($existingFile->status === 'Menunggu Verifikasi') status-menunggu
                                @elseif ($existingFile->status === 'Terverifikasi')
                                    status-terverifikasi
                                @elseif ($existingFile->status === 'Ditolak')
                                    status-ditolak @endif
                            ">
                                {{ $existingFile->status }}
                            </span>
                        @else
                            Status tidak tersedia
                        @endif
                    </h5>

                    <p>File yang sudah diunggah:</p>
                    <div>
                        <div>
                            <img src="{{ asset('storage/buktibayar/' . $existingFile->bukti_pembayaran) }}"
                                style="max-width: 200px; max-height: 200px;">
                        </div>
                    </div>
                </div>
            @endif

        </form>
    @endif
</div>
