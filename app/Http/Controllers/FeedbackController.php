<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function listFeedback (Request $request) {
        $keywords = $request->input('keywords');
        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'desc');
    
        $query = Feedback::orderBy($sortBy, $sortDirection);
    
        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            });
        }
    
        $feedbacks = $query->paginate(5);
        return view('admins.dashboards.feedback', compact('feedbacks', 'keywords', 'sortBy', 'sortDirection'));
    }

    public function sendFeedback (Request $request) {
        $feedback = new Feedback();
        $feedback->name = $request->input('name');
        $feedback->email = $request->input('email');
        $feedback->message = $request->input('message');
        $feedback->save();
        
        return redirect()->route('pages')->with('store', 'success');
    }
}
