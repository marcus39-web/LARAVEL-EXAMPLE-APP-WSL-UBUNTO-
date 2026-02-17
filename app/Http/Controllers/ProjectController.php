<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    // Zeigt alle Projekte an
    public function index()
    {
        $projects = DB::table('projects')->get();
        return view('projects.index', compact('projects'));
    }

    // Zeigt das Formular zum Erstellen
    public function create()
    {
        return view('projects.create');
    }

    // Speichert ein neues Projekt (RAW SQL)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:projects,name',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required',
        ]);
        DB::insert('INSERT INTO projects (name, description, start_date, end_date, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())', [
            $request->name,
            $request->description,
            $request->start_date,
            $request->end_date,
            $request->status,
        ]);
        return redirect()->route('projects.index');
    }

    // Zeigt das Formular zum Bearbeiten
    public function edit($id)
    {
        $project = DB::table('projects')->where('id', $id)->first();
        return view('projects.edit', compact('project'));
    }

    // Aktualisiert ein Projekt (RAW SQL)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:projects,name,' . $id,
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required',
        ]);
        DB::update('UPDATE projects SET name = ?, description = ?, start_date = ?, end_date = ?, status = ?, updated_at = NOW() WHERE id = ?', [
            $request->name,
            $request->description,
            $request->start_date,
            $request->end_date,
            $request->status,
            $id
        ]);
        return redirect()->route('projects.index');
    }

    // Löscht ein Projekt
    public function destroy($id)
    {
        DB::table('projects')->where('id', $id)->delete();
        return redirect()->route('projects.index');
    }
}
