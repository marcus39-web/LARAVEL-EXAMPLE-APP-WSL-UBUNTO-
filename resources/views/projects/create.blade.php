<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Projekt anlegen</title>
</head>
<body>
    <h2>Neues Projekt anlegen</h2>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Beschreibung: <textarea name="description" required></textarea></label><br>
        <label>Startdatum: <input type="date" name="start_date" required></label><br>
        <label>Enddatum: <input type="date" name="end_date" required></label><br>
        <label>Status: <input type="text" name="status" value="pending" required></label><br>
        <button type="submit">Speichern</button>
    </form>
    <a href="{{ route('projects.index') }}">Zurück zur Übersicht</a>
</body>
</html>
