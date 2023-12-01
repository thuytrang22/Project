
$('#modalMenuOder').modal('show');

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

$('[data-quantity="plus"]').click(function(e){
    e.preventDefault();
    fieldName = $(this).attr('data-field');
    let currentVal = parseInt($('input[name='+fieldName+']').val());
    if (!isNaN(currentVal)) {
        $('input[name='+fieldName+']').val(currentVal + 1);
    } else {
        $('input[name='+fieldName+']').val(0);
    }
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
