
let currentUrl = window.location.href;
if (currentUrl.includes("admin")) {
    let dashboasd = document.getElementById("btn-dashboasd");
    dashboasd.classList.add("active");
} 

if (currentUrl.includes("dishes")) {
    let dishes = document.getElementById("btn-dishes");
    dishes.classList.add("active");
} 

if (currentUrl.includes("drinks")) {
    let dishes = document.getElementById("btn-drinks");
    dishes.classList.add("active");
} 