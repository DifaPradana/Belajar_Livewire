<div>
    <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="mb-4">
                        <h5 class="card-title fw-semibold">Timeline Pendaftaran</h5>
                    </div>
                    <ul class="timeline-widget mb-0 position-relative mb-n5">
                        <li class="timeline-item d-flex position-relative overflow-hidden">

                            <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                                <span class="timeline-badge-border d-block flex-shrink-0"></span>
                            </div>
                            <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold"> Melakukan Pembayaran
                                {{-- <i class="ti ti-check fs-6" style="color: green;"></i> --}}
                                <a href="{{ route('pembayaran-pendaftaran-view') }}"
                                    class="text-primary d-block fw-normal">Check</a>
                            </div>
                        </li>
                        <li class="timeline-item d-flex position-relative overflow-hidden">

                            <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                <span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                                <span class="timeline-badge-border d-block flex-shrink-0"></span>
                            </div>
                            <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">Mengisi Form Pendaftaran
                                {{-- <i class="ti ti-x fs-6 " style="color: red"></i> --}}
                                <a href="{{ route('form-pendaftaran-view') }}"
                                    class="text-primary d-block fw-normal">Check</a>
                            </div>
                        </li>
                        <li class="timeline-item d-flex position-relative overflow-hidden">
                            <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                                <span class="timeline-badge-border d-block flex-shrink-0"></span>
                            </div>
                            <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">Upload Berkas
                                <a href="javascript:void(0)" class="text-primary d-block fw-normal">Check</a>
                            </div>
                        </li>
                        {{-- <li class="timeline-item d-flex position-relative overflow-hidden">
                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                            <span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                        </div>
                        <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New arrival recorded
                        </div>
                    </li> --}}
                        <li class="timeline-item d-flex position-relative overflow-hidden">
                            <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                            </div>
                            <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">Pengumuman Pendaftaran
                                <a href="javascript:void(0)" class="text-primary d-block fw-normal"
                                    style="margin-bottom: 40px;">Check</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Recent Transactions</h5>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">No</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Aktivitas</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Keterangan</h6>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histori as $item)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">{{ $item->aktivitas }}</h6>
                                        </td>

                                        <td wire:poll.visible.5s class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                @if ($item->status == 'Menunggu Verifikasi')
                                                    <span
                                                        class="badge bg-primary rounded-3 fw-semibold">{{ $item->status }}</span>
                                                @elseif ($item->status == 'Terverifikasi')
                                                    <span
                                                        class="badge bg-success rounded-3 fw-semibold">{{ $item->status }}</span>
                                                @elseif ($item->status == 'Ditolak')
                                                    <span
                                                        class="badge bg-danger rounded-3 fw-semibold">{{ $item->status }}</span>
                                                @else
                                                    <span
                                                        class="badge bg-primary rounded-3 fw-semibold">{{ $item->status }}</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 fs-4">{{ $item->keterangan }}</h6>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
