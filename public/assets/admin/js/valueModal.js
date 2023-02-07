$(document).ready(function () {
    $(".btn-for-modal").click(function () {
        $("#id_product").val($(this).attr("data-id"));
        $("#name-product-value").text($(this).attr("data-name"));
        $("#merk-value").text($(this).attr("data-merk"));
        $("#bahan-bakar-value").text($(this).attr("data-bahan-bakar"));
        $("#jenis-value").text($(this).attr("data-jenis"));
        $("#warna-value").text($(this).attr("data-warna"));
    });
});
