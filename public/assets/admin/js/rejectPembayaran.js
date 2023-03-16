function rejectPembayaranJS(val) {
    Swal.fire({
        title: "Yakin ingin menolak pembayaran ?",
        text: "Penolakan akan dikirimkan ke pembayar.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#138611",
        cancelButtonColor: "#C72D00",
        confirmButtonText: "Iya",
        cancelButtonText: "Tidak",
    }).then((result) => {
        if (result.isConfirmed) {
            const form =
                val.parentElement.parentElement.parentElement.parentElement
                    .parentElement;
            form.submitButton.click();
        }
    });
}
