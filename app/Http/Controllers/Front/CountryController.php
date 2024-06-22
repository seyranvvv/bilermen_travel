<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Translation;
use App\Country;
use App\Certificate;
use App\Contact;
use App\ContactWith;

class CountryController extends Controller
{
    public function single($slug)
    {

        $country = Country::where('slug', $slug)
            ->whereActive(true)
            ->with('tickets')
            ->firstOrFail();
        $tickets = $country->tickets;
        $half = $tickets->count() / 2;
        $ticketsChunk = $tickets->split(2);
        $contact = Contact::whereType('main')->first();
        $contactWith = ContactWith::first();
       
        $partnersText = Translation::whereslug('partners_text')->first();
        $extras = ['Gündelik nahar', 'Ýol üpjünçiligi', 'GID', 'Suratçy', 'Terjimeçi'];

        return view('front.country.country_single')->with([
            'contact' => $contact,
            'country' => $country,
            'contactWith' => $contactWith,
            'partnersText' => $partnersText,

           
            'ticketsChunk' => $ticketsChunk,
            'extras' => $extras,


        ]);
    }
}
