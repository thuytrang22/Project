<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\BookTableRequest;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;

class BookingController extends Controller
{
    public function bookTable (BookTableRequest $request) 
    {
        
        $booking = new Booking();
        $booking->name = $request->input('name');
        $booking->email = $request->input('email');
        $booking->phone = $request->input('phone');
        $booking->booking_date = $request->input('booking_date');
        $booking->time = $request->input('time');
        $booking->people = $request->input('people');
        $booking->message = $request->input('message');
        $booking->save();

        // Gửi email xác nhận cho khách hàng
        Mail::to($booking->email)->send(new BookingConfirmation($booking));

        // Redirect hoặc trả về view với thông báo thành công
        return redirect()->back()->with('success', 'Your booking table request was sent. We will call back or send an email to confirm your reservation. Thank you!');
    }
}
