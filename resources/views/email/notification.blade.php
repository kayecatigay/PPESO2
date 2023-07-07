<!DOCTYPE html>
<html>
<head>
    <title>{{ $subject }}</title>
</head>
<body>
    <form action="/sendnotif">
        <input type="text" name="email" id="email" value="{{ $email }}">
        <h1>{{ $subject }}</h1>
        <p>{{ $message }}</p>
        <button>send</button>
    </form>
</body>
</html>
