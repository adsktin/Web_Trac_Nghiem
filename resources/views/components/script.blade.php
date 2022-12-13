<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/dashboards-analytics.js"></script>

{{--  <script src="{{ URL('ajax/account.js') }}"></script>  --}}

<!-- Place this tag in your head or just before your close body tag. -->

<script async defer src="https://buttons.github.io/buttons.js"></script>

<script type="text/javascript">
    {{--  Account  --}}

    function previewimg(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#Imgpreview').attr('src', e.target.result);
                $('#ImgDivpreview');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
{{--  delete  --}}
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Bạn có chắc là muốn xóa không?`,
                text: "Nếu bạn xóa sẽ không thể phục hồi.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
