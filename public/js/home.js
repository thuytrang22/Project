$(document).ready(function() {
    $('#btnHome').click(function() {
        let phoneNumber = $('#inputPhone').val();
        let phoneRegex = /^(086|096|097|098|039|038|037|036|035|034|033|032|091|094|088|083|084|085|081|082|070|079|077|076|078|089|090|093|092|052|056|058|099|059|087)\d{7}$/;

        if (phoneNumber.length > 10) {
            phoneNumber = phoneNumber.substring(0, 10);
        }

        if (phoneNumber.length !== 10) {
            $('#inputPhone').val(phoneNumber);
            alert('Lỗi: Số điện thoại phải có đúng 10 ký tự.');
        } else if (!phoneRegex.test(phoneNumber)) {
            alert('Lỗi: Số điện thoại nhập sai.');
        }
    });
});