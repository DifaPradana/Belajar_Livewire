<div>
    @if (session()->has('message'))
        <div class="alert alert-success mt-2 auto-dismiss" role="alert">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger mt-2 auto-dismiss" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                {{-- <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg> --}}
                            </div>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                placeholder="Search" required="">
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <div class="flex space-x-3 items-center">
                            <label class="w-40 text-sm font-medium text-gray-900">User Type :</label>
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="">All</option>
                                <option value="0">Menunggu Verifikasi</option>
                                <option value="1">Terverifikasi</option>
                                <option value="2">Ditolak</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="px-4 py-3">no</th>
                                <th class="px-4 py-3">nama pendaftar</th>
                                <th class="px-4 py-3">jalur pendaftaran</th>
                                <th class="px-4 py-3">rincian</th>
                                <th class="px-4 py-3">Last update</th>
                                <th class="px-4 py-3 text-center">Actions</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayarans as $item)
                                <tr wire:key="{{ $item->id_pembayaran }}" class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3">{{ $item->nama_rekening_pengirim }}</td>
                                    <td class="px-4 py-3">{{ $item->metodePembayaran->nama_metode_pembayaran }}</td>
                                    <td class="px-4 py-3 ">
                                        <a href="#imageModal{{ $item->id_pembayaran }}" data-bs-toggle="modal"
                                            class="btn btn-info block btn-sm" style="width: 40px; margin-bottom: 10px;">
                                            <i class="ti ti-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td class="px-4 py-3">{{ $item->updated_at->format('H:i:s, d/m/Y') }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <select
                                            wire:change="changeStatus({{ $item->id_pembayaran }}, $event.target.value)"
                                            class="form-select" id="status-{{ $item->id_pembayaran }}"
                                            aria-label="Default select example">
                                            <option value="Menunggu Verifikasi"
                                                {{ $item->status == 'Menunggu Verifikasi' ? 'selected' : '' }}>
                                                Menunggu Verifikasi</option>
                                            <option value="Terverifikasi"
                                                {{ $item->status == 'Terverifikasi' ? 'selected' : '' }}>
                                                Terverifikasi
                                            </option>
                                            <option value="Ditolak" {{ $item->status == 'Ditolak' ? 'selected' : '' }}>
                                                Ditolak</option>
                                        </select>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="imageModal{{ $item->id_pembayaran }}" tabindex="-1"
                                    aria-labelledby="imageModalLabel{{ $item->id_pembayaran }}" aria-hidden="true"
                                    wire:ignore.self>
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel{{ $item->id_pembayaran }}">
                                                    Bukti Pembayaran
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('storage/buktibayar/' . $item->bukti_pembayaran) }}"
                                                    alt="Bukti Pembayaran" class="img-fluid"
                                                    id="image-{{ $item->id_pembayaran }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
                            @endforeach
                        </tbody>

                    </table>
                </div>



                <div class="py-4 px-3">
                    <div class="flex ">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
