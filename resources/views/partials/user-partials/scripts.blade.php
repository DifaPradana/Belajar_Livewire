<script src="{{ asset('/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('/js/app.min.js') }}"></script>
<script src="{{ asset('/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('/js/dashboard.js') }}"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.auto-dismiss');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 1500); // Delay removal to allow fade effect
            }, 5000); // Time before fade (in milliseconds)
        });
    });
</script>
