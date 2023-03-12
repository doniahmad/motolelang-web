function alertBeforeLogin() {
    // Swal.fire({
    //     title: 'Anda belum memiliki login!',
    //     text: 'Anda perlu login untuk mengikuti pelelangan.'
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#138611',
    //     cancelButtonColor: '#C72D00',
    //     confirmButtonText: 'Iya',
    //     cancelButtonText: 'Tidak',
    // }).then((result) => {
    //     if (result.isConfirmed) {
    //         window.location.href = '/login';
    //     }
    // });
    Swal.fire({
        title: "Anda belum melakukan login!",
        // text: 'Anda perlu login untuk mengikuti pelelangan.'
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#138611",
        cancelButtonColor: "#C72D00",
        confirmButtonText: "Login",
        cancelButtonText: "Tidak",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "/login";
        }
    });
}

function alertProfileNotFull() {
    Swal.fire({
        title: "Data Profil anda belum lengkap !",
        // text: 'Anda perlu login untuk mengikuti pelelangan.'
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#138611",
        cancelButtonColor: "#C72D00",
        confirmButtonText: "Lengkapi",
        cancelButtonText: "Tidak",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "/profil";
        }
    });
}
