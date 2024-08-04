<div>
    <form wire:submit.prevent = 'save'>
        <h5 class="card-title fw-semibold mb-4">Silahkan isi upload berkas pendaftaran</h5>

        @foreach ($berkas as $index => $berkasItem)
            {{-- <div class="mb-3 d-flex align-items-center">
                <label for="formBerkas_{{ $index }}" class="form-label me-2">Upload berkas
                    {{ $berkasItem->nama_berkas }}</label>
                <input class="form-control me-2" wire:model="files.{{ $index }}"
                    accept="image/jpg, image/png, image/jpeg" type="file" id="formBerkas_{{ $index }}">
                <button type="button" class="btn btn-primary" wire:click="save({{ $index }})">Upload</button>
            </div>
            <div wire:loading wire:target="files.{{ $index }}">Loading...</div> --}}

            <div class="mb-3">
                <label for="formBerkas_{{ $index }}" class="form-label">Upload berkas
                    {{ $berkasItem->nama_berkas }}</label>
                <input class="form-control" wire:model="files.{{ $index }}"
                    accept="image/jpg, image/png, image/jpeg" type="file" id="formBerkas_{{ $index }}">
                @error('files.' . $index)
                    <span class="text-red-500" style="color: red">Upload file dengan tipe jpg, jpeg, atau png. Maksimum 1
                        MB</span>
                @enderror
                <div class="mb-3">
                    <div wire:loading wire:target="files.{{ $index }}" class="spinner-border text-primary me-2"
                        role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    @if (isset($files[$index]) && $files[$index])
                        <div class="mb-3 d-flex">
                            <label for="preview_{{ $index }}" class="form-label">Preview:</label>
                            <img src="{{ $files[$index]->temporaryUrl() }}" alt="Preview" class="img-thumbnail me-2"
                                style="max-height: 200px;" id="preview_{{ $index }}">
                        </div>
                    @endif

                    <div style="margin-top: 10px;">
                        <button type="button" class="btn btn-primary"
                            wire:click="save({{ $index }})">Upload</button>
                    </div>

                    @if (session('success'))
                        <div class="card-body p-4">
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        </div>
                    @elseif (session('error'))
                        <div class="card-body p-4">
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif
                    {{-- @dd($existingBerkas) --}}

                    @if (isset($existingBerkas[$index]) && $existingBerkas[$index]->berkas)
                        <div class="mb-3 d-flex">
                            <div class="mb-3 d-flex flex-column">
                                <br>
                                <label for="preview_{{ $index }}" class="form-label">Berkas yang pernah
                                    diupload:</label>
                                <img src="{{ asset('storage/berkas/' . $existingBerkas[$index]->berkas) }}"
                                    alt="Preview" class="img-thumbnail me-2" style="max-height: 200px;"
                                    id="preview_{{ $index }}">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach


    </form>


</div>
