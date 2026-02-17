<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class FormController extends Controller
{
    public function submitForm(Request $request)
    {
        // 1. Felder prüfen
        if (!$request->has('name') || !$request->has('email')) {
            return response('Name und E-Mail sind erforderlich.', 400);
        }

        // 2. E-Mail validieren
        if (!filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)) {
            // Fehler: ungültige E-Mail, zurück zur vorherigen Seite
            return redirect()->back()->withErrors(['email' => 'Ungültige E-Mail-Adresse!'])->withInput();
        }

        // 3. Erfolg: Weiterleitung auf Danke-Seite
        return redirect('/thanks')->with('success', 'Anmeldung erfolgreich!');
    }
}
