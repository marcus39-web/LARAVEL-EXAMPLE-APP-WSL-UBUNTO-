<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function showAbout()
    {
        $company = 'Tech Solutions Inc.';
        $description = 'Wir helfen Unternehmen, effizienter zu arbeiten.';
        $services = ['IT-Beratung', 'Softwareentwicklung', 'Cloud-Lösungen'];
        // Übergabe mit compact und with
        return view('about', compact('description', 'services'))->with('company', $company);
    }
}
