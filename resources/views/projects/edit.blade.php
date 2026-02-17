<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Projekt bearbeiten</title>
</head>
<body>
    <h2>Projekt bearbeiten</h2>
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        <label>Name: <input type="text" name="name" value="{{ $project->name }}" required></label><br>
        <label>Beschreibung: <textarea name="description" required>{{ $project->description }}</textarea></label><br>
        <label>Startdatum: <input type="date" name="start_date" value="{{ $project->start_date }}" required></label><br>
        <label>Enddatum: <input type="date" name="end_date" value="{{ $project->end_date }}" required></label><br>
        <label>Status: <input type="text" name="status" value="{{ $project->status }}" required></label><br>
        <button type="submit">Aktualisieren</button>
    </form>
    <a href="{{ route('projects.index') }}">Zurück zur Übersicht</a>
</body>
</html>
