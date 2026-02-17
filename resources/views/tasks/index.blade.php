<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f6f8fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 40px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 32px 28px 24px 28px;
        }
        h1 {
            color: #2d3748;
            margin-bottom: 18px;
            text-align: center;
        }
        .flash {
            background: #e6ffed;
            color: #207227;
            border: 1px solid #b7ebc6;
            border-radius: 5px;
            padding: 10px 16px;
            margin-bottom: 18px;
            text-align: center;
        }
        ul.task-list {
            list-style: none;
            padding: 0;
            margin-bottom: 24px;
        }
        ul.task-list li {
            background: #f1f5f9;
            margin-bottom: 10px;
            padding: 10px 14px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .delete-btn {
            background: #e53e3e;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 5px 12px;
            cursor: pointer;
            font-size: 0.95em;
            transition: background 0.2s;
        }
        .delete-btn:hover {
            background: #c53030;
        }
        .add-task-form {
            background: #f9fafb;
            border-radius: 8px;
            padding: 18px 14px 10px 14px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.03);
        }
        .add-task-form label {
            display: block;
            margin-bottom: 4px;
            color: #4a5568;
        }
        .add-task-form input,
        .add-task-form textarea {
            width: 100%;
            padding: 7px 8px;
            margin-bottom: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 4px;
            font-size: 1em;
        }
        .add-btn {
            background: #3182ce;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 18px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.2s;
        }
        .add-btn:hover {
            background: #2563eb;
        }
        @media (max-width: 600px) {
            .container {
                padding: 12px 4vw 12px 4vw;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        @if (session('status'))
            <div class="flash">{{ session('status') }}</div>
        @endif

        <h1>Your Tasks</h1>
        <ul class="task-list">
            @forelse ($tasks as $task)
                <li>
                    <span>{{ $task->title }}</span>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline; margin: 0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </li>
            @empty
                <li style="text-align:center; color:#888;">No tasks available.</li>
            @endforelse
        </ul>

        <h2 style="margin-bottom:10px;">Add a New Task</h2>
        <form action="{{ route('tasks.store') }}" method="POST" class="add-task-form">
            @csrf
            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <button type="submit" class="add-btn">Add Task</button>
        </form>
    </div>
</body>
</html>
