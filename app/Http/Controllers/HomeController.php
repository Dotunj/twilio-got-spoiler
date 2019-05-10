<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spoiler;
use App\PhoneNumber;

class HomeController extends Controller
{
    public function index()
    {
        $spoilers = Spoiler::latest()->get();

        $phoneNumbers = PhoneNumber::all();

        return view('home', compact('spoilers', 'phoneNumbers'));
    }

    public function storeSpoiler(Request $request, Spoiler $spoiler)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);

        $spoiler->create($request->only(['message']));

        return back()->with('success', 'Spoiler has been added successfully');
    }

    public function storePhoneNumber(Request $request, PhoneNumber $number)
    {
        $this->validate($request, [
            'phone_number' => 'required' 
        ]);

        $number->create($request->only(['phone_number']));

        return back()->with('success', 'Phone Number has been added successfully');
    }
}
