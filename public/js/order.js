
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
    for (let i = 0; i < arrPrice.length; i++) {
        let price = arrPrice[i].price
        let j = i+1 ;
        let priceShow = price * j        
        $('#gia').val(priceShow);
    }   
    $('#tabFooter').show();
    $('.badge').show();
}
function removeFromCart(dishId) {
    if (cart[dishId]) {
        delete cart[dishId];
           
        for (let i = 0; i < arrPrice.length; i++) {
            let price = arrPrice[i].price;
            let demo = $('#gia').val();
            var totalPrice;
            console.log(demo);
                totalPrice = demo - price;       
            $('#gia').val(totalPrice);
            arrPrice.splice(i,1);
        };
        // $('#gia').val(totalPrice);
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
    let quantityInput = button.parentNode.querySelector('.ip-number');
    let currentQuantity = parseInt(quantityInput.value);
    if (currentQuantity > 0) {
        quantityInput.value = currentQuantity - 1;
        removeFromCart(dishId);
        if(quantityInput.value == 0){
            console.log(111);
            arrPrice.splice(0,1);
            // $('#tabFooter').hide();
            // $('.badge').hide();
        }
    }
}