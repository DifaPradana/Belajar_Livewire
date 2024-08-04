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
        {{-- @livewire('chart-component') --}}
    </div>
</div>
