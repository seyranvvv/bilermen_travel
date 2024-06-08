<?php

namespace App\Http\Controllers\Front;

use App\Certificate;
use App\Contact;
use App\ContactWith;
use App\District;
use App\Greet;
use App\Http\Controllers\Controller;
use App\Visa;
use App\VisaAbout;
use App\Translation;
use App\VisaBanner;
use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function index()
    {

        $visas = Visa::get();
        $visasChunk = $visas->split(2);
        $contact = Contact::whereType('main')->first();
        $contactWith = ContactWith::first();
        $visaBanner = VisaBanner::where('active',1)->latest()->first();
        $greets = Greet::all();
        $partnersText = Translation::whereslug('partners_text')->first();


        $contactText = Translation::whereslug('contact_us_text')->first();
        $districts = District::all();

        return view('front.visa.index')->with([
            'contact' => $contact,
            'contactWith' => $contactWith,
            'visaBanner' => $visaBanner,
            'partnersText' => $partnersText,

            'greets' => $greets,
            'visas' => $visas,
            'visasChunk' => $visasChunk,
            'contactText' => $contactText,
            'districts' => $districts,
        ]);
    }
}
