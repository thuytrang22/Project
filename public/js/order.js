
$('#modalMenuOder').modal('show');
$('#modalOption').modal('show');
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

$('[data-quantity="minus"]').click(function(e) {
    e.preventDefault();
    adjustQuantity(e, 'minus');
    checkAndShowModal();
});

$('[data-id="minus"]').click(function(e) {
    e.preventDefault();
    let id = $(".img-show").data("id");
    let btnMinus = $("#minus-" + id );
    fieldName = $(this).attr('data-field');
    let currentVal = parseInt($('input[name='+fieldName+']').val());
    if (!isNaN(currentVal) && currentVal > 0) {
        $('input[name='+fieldName+']').val(currentVal - 1);
    } else {
        $('input[name='+fieldName+']').val(0);
    }
});

function adjustQuantity(e, action) {
    let fieldName = $(e.currentTarget).attr('data-field');
    let inputField = $('input[name=' + fieldName + ']');
    let currentVal = parseInt(inputField.val());

    if (!isNaN(currentVal)) {
        if (action === 'plus') {
            inputField.val(currentVal + 1);
        } else if (action === 'minus' && currentVal > 0) {
            inputField.val(currentVal - 1);
        } else {
            inputField.val(0);
        }
    }
}

function checkAndShowModal() {
    let inputField = $('input[name="yourFieldName"]');
    
    if (inputField.val() !== '0') {
        $('#modalCart').modal('show');
    }
}

