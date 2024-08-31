<!DOCTYPE html>
<html>

<head>
    <title>Your Login Credentials</title>
</head>

<body>
    <h1>Hello {{ $recipient }}</h1>
    <span>Your login credential is: </span> <br>
    <span>Username: <strong>{{ $nim }}</strong></span> <br>
    <span>Password: <strong>{{ $password }}</strong></span> <br>
    <span>Please make sure to change your password after logging in for the first time.</span>
</body>

</html>
