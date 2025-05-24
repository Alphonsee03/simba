

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- 5. Active sidebar --}}
<script>
    $(document).ready(function() {
        $('.sidebar-item').removeClass('active');
        var currentUrl = window.location.href;
        $('.sidebar-item a').each(function() {
            var linkUrl = $(this).attr('href');
            if(currentUrl.includes(linkUrl) && linkUrl !== "") {
                $(this).parent().addClass('active');
            }
        });
    });
</script>

@stack('scripts')
</body>
</html>
<!-- <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script> -->