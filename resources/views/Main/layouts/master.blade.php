<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{!! '/assets/main/css/style.css' !!}">
    <link rel="stylesheet" type="text/css" href="{!! '/assets/main/css/footer.css' !!}">
    <link rel="stylesheet" type="text/css" href="{!! '/assets/main/css/login.css' !!}">
    <link rel="stylesheet" type="text/css" href="{!! '/assets/main/css/filter.css' !!}">
    {{-- <link rel="stylesheet" type="text/css" href="{!! '/assets/main/css/navbarLogin.css' !!}"> --}}
    <link rel="stylesheet" type="text/css" href="{!! '/assets/main/css/detailSlider.css' !!}">
    <link rel="stylesheet" type="text/css" href="{!! '/assets/main/css/modal.css' !!}">
    <link rel="stylesheet" type="text/css" href="{!! '/assets/main/css/alert.css' !!}">

    <link rel="shortcut icon" href="{!! '/assets/admin/img/logo-2.svg' !!}">
    <link rel="icon" href="{!! '/assets/admin/img/logo-2.svg' !!}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        // alert pembayaran sukses
        $(function() {
            $(document).on('click', '#suksesPembayaran', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Bukti berhasil dikirimkan',
                    text: 'Silahkan menunggu sampai bukti di konfirmasi oleh admin',
                })
            })
        });

        // alert logout
        $(function() {
            $(document).on('click', '#', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Yakin ingin keluar ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#23EC1E',
                    cancelButtonColor: '#E11A22',
                    confirmButtonText: 'Ya',
                    cancelButtonText: "Tidak",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Keluar',
                            text: 'Anda Telah Keluar',
                            confirmButtonColor: '#23EC1E',
                        })
                    }
                })
            })
        });

        // alert pemasangan penawaran berhasil
        $(function() {
            $(document).on('click', '#', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Pemasangan penawaran berhasil.',

                })
            })
        });

        // alert perlu login
        $(function() {
            $(document).on('click', '#', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Anda perlu login untuk dapat melakukan pelelangan',
                })
            })
        });
    </script>

    <title>@yield('title')</title>
</head>

<body>

    @if (!auth()->check())
        @include('Main.components.navbar')
    @else
        @include('Main.components.navbarLogin')
    @endif

    @yield('content')

    @include('Main.components.footer')

    @stack('scripts')

    @include('sweetalert::alert')
</body>

</html>
