@component('mail::message')
# Booking Table Confirmation

Dear {{ $booking->name }},

Your booking table request has been received. We will get in touch with you shortly to confirm your reservation.

Thank you for choosing us!

@component('mail::button', ['url' => ''])
Visit our website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
