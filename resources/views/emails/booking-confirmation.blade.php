@component('mail::message')
# Nhà hàng Hana Sushi cảm ơn Quý khách hàng đã đặt bàn tại nhà hàng chúng tôi.

Chào {{ $booking->name }},

Yêu cầu đặt bàn của bạn đã được nhận. Chúng tôi sẽ gọi điện xác nhận sớm nhất tới bạn.

Cảm ơn vì đã chọn chúng tôi!

@component('mail::button', ['url' => ''])
Truy cập trang web của chúng tôi
@endcomponent

Cảm ơn,<br>
{{ config('app.name') }}
@endcomponent
