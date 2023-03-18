<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    <h2>Haloooo</h2> 
    <br>
        
    <strong>User details: </strong><br>
    <strong>Email: </strong>{{ $data->email }} <br>
    <strong>Subject: </strong>{{ $data->subject }} <br>
    <strong>Message: </strong>{{ $data->comment }} <br><br>

    Thank you
</body>
</html>