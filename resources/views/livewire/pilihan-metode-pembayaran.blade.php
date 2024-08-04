<div>

    <h5 class="card-title fw-semibold mb-4">Pendaftaran Mahasiswa Baru</h5>
    <p class="mb-0">Untuk melakukan pendaftaran, calon mahasiswa diharuskan untuk melakukan pembayaran pednaftaran
        terlebih dahulu.</p>


    <h5 class="mt-5">Total pembayaran : </h5>


    <h5 class="mt-5">Metode pembayaran : </h5>
    <br>
    <div class="card">
        <div class="card-header" id="headingOne" data-bs-toggle="collapse" data-bs-target="#collapseOne">
            <div class="d-flex align-items-center">
                <img src="{{ asset('images/logos/gopay-logo.png') }}" alt="Gopay" width="50" height="50">
                <h5 class="mb-0 ms-3">
                    Gopay
                </h5>
                <i class="ti ti-chevron-down ms-auto arrow-icon"></i>
            </div>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
            {{-- <div class="card-body no-collapse">
                This is the collapsible content for Gopay.
            </div> --}}
            <div class="card-body text-center no-collapse">
                <img src="{{ asset('images/gopay-qr.png') }}" alt="Gopay" width="250" height="250">
            </div>
        </div>
    </div>

</div>
