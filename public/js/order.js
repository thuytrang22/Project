
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

function decreaseQuantity(button) {
    let quantityInput = button.parentNode.querySelector('.ip-number');
    let currentQuantity = parseInt(quantityInput.value);
    if (currentQuantity > 0) {
        quantityInput.value = currentQuantity - 1;
    }
    cart (quantityInput.value)
}

function increaseQuantity(button) {
    let quantityInput = button.parentNode.querySelector('.ip-number');
    let currentQuantity = parseInt(quantityInput.value);

    quantityInput.value = currentQuantity + 1;
    cart (quantityInput.value)
}

    let number = $('.ip-number').val();
    console.log(number);
$('.badge').hide()
// $('#tabFooter').hide()
function cart (data) {
    if (data > 0) {
        
        console.log(data);
        $('#tabFooter').show()
        $('.badge').show()
    }else {
        console.log(data);
        $('#tabFooter').hide()
        $('.badge').hide()
    }
}
// Function to add to cart
function addToCart(button) {
    let product = button.parentNode;
    let productName = product.querySelector('h3').innerText;
    let productPrice = product.querySelector('.price').innerText;
    let quantity = parseInt(product.querySelector('.quantity-input').value);

    // Create a new cart item
    let cartItem = document.createElement('li');
    cartItem.className = 'cart-item';
    cartItem.innerHTML = `
        <span>${productName} (Quantity: ${quantity})</span>
        <span>${productPrice}</span>
    `;

    // Add the cart item to the cart
    let cartItems = document.getElementById('cart-items');
    cartItems.appendChild(cartItem);
}

function checkAndShowModal() {
    let inputField = $('input[name="quantity"]');
    
    if (inputField.val() !== '0') {
        $('#modalCart').modal('show');
    }
}