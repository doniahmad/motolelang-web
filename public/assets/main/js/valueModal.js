$(document).ready(function () {
    $(".btn-for-modal").click(function () {
        $("#kode_pembayaran_container").val($(this).attr("data-kode"));
    });
});
