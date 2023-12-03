
let currentUrl = window.location.href;
if (currentUrl.includes("admin")) {
    let dashboasd = document.getElementById("btn-dashboasd");
    dashboasd.classList.add("active");
} 

if (currentUrl.includes("menu")) {
    let dishes = document.getElementById("btn-menus");
    dishes.classList.add("active");
} 
setTimeout(removeAlert, 3000);

function removeAlert() {
    $('#store').remove();
    $('#update').remove();
    $('#destroy').remove();
}