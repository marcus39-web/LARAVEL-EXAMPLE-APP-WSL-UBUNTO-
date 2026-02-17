<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Projektübersicht</title>
</head>
<body>
    <h2>Projektübersicht</h2>
    <a href="{{ route('projects.create') }}">Neues Projekt anlegen</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Beschreibung</th>
                <th>Start</th>
                <th>Ende</th>
                <th>Status</th>
                <th>Aktionen</th>
            </tr>
        </thead>
        <tbody>
        @forelse($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->start_date }}</td>
                <td>{{ $project->end_date }}</td>
                <td>{{ $project->status }}</td>
                <td>
                    <a href="{{ route('projects.edit', $project->id) }}">Bearbeiten</a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline">
                        @csrf
                        <button type="submit" onclick="return confirm('Wirklich löschen?')">Löschen</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7">Keine Projekte vorhanden.</td></tr>
        @endforelse
        </tbody>
    </table>
</body>
</html>
