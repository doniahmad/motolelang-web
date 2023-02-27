const btnUrutkan = document.querySelector("#btnUrutkan");
const urutkankonten = document.querySelector("#urutkanKonten");

btnUrutkan.addEventListener("click", () => {
    if (urutkankonten.style.display === "none") {
        urutkankonten.style.display = "block";
    } else {
        urutkankonten.style.display = "none";
    }
});
