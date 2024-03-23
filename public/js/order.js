
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

let cart = [];
$('.badge').hide();
$('#tabFooter').hide();
function addToCart(dishId, quantity, price) {
    let totalNow = $('#gia').val().replace(/,/g, "") == "" ? 0 : parseInt($('#gia').val().replace(/,/g, ""))
    let total = totalNow + price
    $('#gia').val(total.toLocaleString())

    if ($('#menu' + dishId).length) {
        $('#menu' + dishId).val(quantity);
    } else {
        $('<input>').attr({
            type: 'hidden',
            id: 'menu' + dishId,
            name: 'menus[' + dishId + ']',
            value: quantity,
        }).appendTo('#formOrder')
    }

    $('#tabFooter').show();
    $('.badge').show();
}
function removeFromCart(dishId, quantity, price) {
    let total = parseInt($('#gia').val().replace(/,/g, "")) - price
    if (total == 0) {
        $('#gia').val('')
        $('#tabFooter').hide()
    } else {
        $('#gia').val(total.toLocaleString())
    }

    if ($('#menu' + dishId).length) {
        $('#menu' + dishId).val(quantity);
    }
}
function increaseQuantity(button) {
    let dishId = button.getAttribute('data-id');
    let price = button.getAttribute('data-price');
    let priceValue = parseFloat(price);
    let quantityInput = button.parentNode.querySelector('.ip-number');
    let currentQuantity = parseInt(quantityInput.value);
    quantityInput.value = currentQuantity + 1;
    addToCart(dishId, quantityInput.value, priceValue);
}
function decreaseQuantity(button) {
    let dishId = button.getAttribute('data-id');
    let price = button.getAttribute('data-price');
    let quantityInput = button.parentNode.querySelector('.ip-number');
    let currentQuantity = parseInt(quantityInput.value);
    if (currentQuantity > 0) {
        quantityInput.value = currentQuantity - 1;
        removeFromCart(dishId, quantityInput.value, price);
    }
}

$('.infor_id').click(function() {
    alert('Bạn phải quét lại mã Qr để đặt món!')
})