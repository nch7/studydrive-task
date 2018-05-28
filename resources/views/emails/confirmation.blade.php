<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Studydrive's sample task!</title>
</head>
<body>
Please click on the below link to confirm your email account
<br/>
<a href="{{url('confirm', $user->confirmationToken->token)}}">Confirm Email</a>
</body>

</html>