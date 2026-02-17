<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $name = 'Max Mustermann';
        $age = 28;
        $bio = 'Ich bin ein begeisterter Webentwickler und liebe es, neue Technologien zu entdecken.';
        $hobbies = ['Programmieren', 'Radfahren', 'Fotografie'];
        return view('profile', compact('name', 'age', 'bio', 'hobbies'));
    }
}
