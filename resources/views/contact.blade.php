@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif
@if($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="/contact">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}"><br>
    <label for="email">E-Mail:</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}"><br>
    <label for="message">Nachricht:</label>
    <textarea name="message" id="message">{{ old('message') }}</textarea><br>
    <button type="submit">Absenden</button>
</form>
