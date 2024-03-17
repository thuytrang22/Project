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
        return response('OK', 200);
    }

    public function updateCheckbox (Request $request) {
        $booking = Booking::find($request->id);
        $booking->status = $request->status;
        $booking->save();
        return redirect()->route('seatings')->with('update', 'success');
    }

    public function updateTable (Request $request) {
        $booking = Booking::find($request->id);
        $booking->seating_id = $request->seating_id;
        $booking->save();
        return redirect()->route('seatings')->with('update', 'success');
    }
}
