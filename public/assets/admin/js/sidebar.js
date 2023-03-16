$(document).ready(function () {
    $("#dismiss, .overlay").on("click", function () {
        // hide admin-sidebar
        $("#admin-sidebar").removeClass("active");
        // hide overlay
        $(".overlay").removeClass("active");
    });

    $("#sidebar-toggle").on("click", function () {
        // open admin-sidebar
        $("#admin-sidebar").addClass("active");
        // fade in the overlay
        $(".overlay").addClass("active");
        $(".collapse.in").toggleClass("in");
        $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });
});
