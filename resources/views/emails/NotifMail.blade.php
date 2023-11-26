<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PpesoNotification</title>
</head>
<body>
    <h3>{{$detail['title']}}</h3>
    <p>Ms/Mr, {{$detail['name']}}</p>
    <p>{{$detail['body']}} <br>
        When: {{$detail['date']}} at {{$detail['location']}}
    </p>
    
</body>
</html>