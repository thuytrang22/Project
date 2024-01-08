
// $('#modalMenuOder').modal('show');

$('body').addClass("bg-menu")

$("#scrollDish").click(function() {
    let targetHeader = $("#headerDish");
    $("html, body").animate({
      scrollTop: targetHeader.offset().top
    }, 100);
});

$("#scrollCallMore").click(function() {
    let targetHeader = $("#headerCallMore");
    $("html, body").animate({
      scrollTop: targetHeader.offset().top
    }, 100);
});

$("#scrollDrink").click(function() {
    let targetHeader = $("#headerDrink");
    $("html, body").animate({
      scrollTop: targetHeader.offset().top
    }, 100);
});

let arrPrice = [];
let cart = {};
$('.badge').hide();
$('#tabFooter').hide();
function addToCart(dishId, quantity, price) {
    if (cart[dishId]) {
        cart[dishId].quantity += quantity;
    } else {
        cart[dishId] = {
            quantity: quantity,
            price: price
        };
    }
    arrPrice.push(cart[dishId]);
    displayCart(price);
}
function removeFromCart(dishId, price) {
    if (cart[dishId]) {
        delete cart[dishId];
    arrPrice.splice(cart[dishId],1);
        displayCart(price);
    }
}
let arrayPrice = []
function displayCart(price) {
    arrayPrice = [price]
    let totalQuantity = Object.values(cart).reduce((total, item) => total + item.quantity, 0);
    for (let i = 0; i < arrPrice.length; i++) {
        let price = arrPrice[i].price
        let quantity = arrPrice[i].quantity
        let j = i+1 ;
            console.log(price* j);
    }
   
    if (totalQuantity > 0) {
        $('#tabFooter').show();
        $('.badge').show();
        $('#gia').val(arrayPrice);
    } else {
        $('#tabFooter').hide();
        $('.badge').hide();
    }
}
function increaseQuantity(button) {
    let btnGroup = $(button).closest('.btn-group');
    let dishId = btnGroup.data('id');
    let priceText = btnGroup.find('.price').text();
    let priceValue = parseFloat(priceText.replace(/[^\d.]/g, ''));
    let quantityInput = button.parentNode.querySelector('.ip-number');
    let currentQuantity = parseInt(quantityInput.value);
    quantityInput.value = currentQuantity + 1;
    addToCart(dishId, 1, priceValue);
}
function decreaseQuantity(button) {
    let btnGroup = $(button).closest('.btn-group');
    let dishId = btnGroup.data('id');
    let priceText = btnGroup.find('.price').text();
    let priceValue = parseFloat(priceText.replace(/[^\d.]/g, ''));
    let quantityInput = button.parentNode.querySelector('.ip-number');
    let currentQuantity = parseInt(quantityInput.value);
    if (currentQuantity > 0) {
        quantityInput.value = currentQuantity - 1;
        removeFromCart(dishId,  priceValue);
    }
}