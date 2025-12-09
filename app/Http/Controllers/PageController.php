<?php

namespace App\Http\Controllers;

use App\Models\InternetPackage;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $packages = InternetPackage::active()->limit(3)->get();
        $contactInfo = ContactInfo::active()->get()->groupBy('type');
        
        return view('home', compact('packages', 'contactInfo'));
    }

    public function services()
    {
        $packages = InternetPackage::active()->get();
        $contactInfo = ContactInfo::active()->get()->groupBy('type');
        
        return view('services', compact('packages', 'contactInfo'));
    }

    public function about()
    {
        $contactInfo = ContactInfo::active()->get()->groupBy('type');
        
        return view('about', compact('contactInfo'));
    }
}
