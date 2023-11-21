{{-- toastr message --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}");
    @endif
</script>
{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success m-3',
                    cancelButton: 'btn btn-danger',
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You want to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    window.location.href = link;
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your file is safe :)',
                        'error'
                    )
                }
            })
        });
    });
</script>
<!-- script file here -->
<script src="{{ asset('frontend') }}/public/assets/plugins/js/jquery.js"></script>
<script src="{{ asset('frontend') }}/public/assets/plugins/js/swipper.js"></script>
<script src="{{ asset('frontend') }}/public/assets/plugins/js/select2.js"></script>
<script src="{{ asset('frontend') }}/public/assets/plugins/js/mixitUp.js"></script>
<script src="{{ asset('frontend') }}/public/js/app.js"></script>
    <script>
        $(document).ready(function() {
            $('.minus').click(function() {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus').click(function() {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
        });
    </script>
