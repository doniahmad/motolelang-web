<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/admin/css/style.css">
    <link rel="stylesheet" href="/assets/admin/css/navbar.css">
    <link rel="stylesheet" href="/assets/admin/css/sidebar.css">
    <link rel="stylesheet" href="/assets/admin/css/dashboard.css">
    <link rel="stylesheet" href="/assets/admin/css/product.css">
    <link rel="stylesheet" href="/assets/admin/css/input-product.css">
    <link rel="stylesheet" href="/assets/admin/css/login.css">
    <link rel="stylesheet" href="/assets/admin/css/alert.css">
    <link rel="stylesheet" href="/assets/admin/css/modal.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/regular.min.css"
        integrity="sha512-k2UAKyvfA7Xd/6FrOv5SG4Qr9h4p2oaeshXF99WO3zIpCsgTJ3YZELDK0gHdlJE5ls+Mbd5HL50b458z3meB/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.2.10/dist/css/tempus-dominus.min.css"
        crossorigin="anonymous">

    {{-- Javascript --}}



    {{-- CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.2.10/dist/js/tempus-dominus.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        // alert hapus
        $(function() {
            $(document).on('click', '#', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Yakin ingin menghapus barang ?',
                    text: "Anda akan menghapus barang.Pikirkan terlebih dahulu",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#138611',
                    cancelButtonColor: '#C72D00',
                    confirmButtonText: 'Iya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Terhapus',
                            text: 'Barang anda berhasil dihapus',
                            confirmButtonColor: '#138611',
                        })
                    }
                })

            })
        });

        // alert edit 
        $(function() {
            $(document).on('click', '#', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Yakin ingin mengedit barang ?',

                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#138611',
                    cancelButtonColor: '#C72D00',
                    confirmButtonText: 'Ya',
                    cancelButtonText: "Tidak",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Teredit',
                            text: 'Barang anda berhasil diedit',
                            confirmButtonColor: '#138611',
                        })
                    }
                })

            })
        });

        //alert banned user
        $(function() {
            $(document).on('click', '#banned', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Yakin ingin banned user ?',
                    text: "Anda akan banned user.Pikirkan terlebih dahulu",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#138611',
                    cancelButtonColor: '#C72D00',
                    confirmButtonText: 'Iya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Banned',
                            text: 'Pengguna telah berhasil dibanned',
                            confirmButtonColor: '#138611',
                        })
                    }
                })

            })
        });
    </script>

    <title>@yield('title')</title>
</head>

<body>

    @include('Admin.components.navbar')
    @include('Admin.components.sidebar')

    @yield('content')

    {{-- CUSTOM JS --}}

    @stack('scripts')


</body>

</html>
