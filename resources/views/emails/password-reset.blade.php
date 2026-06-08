<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset</title>
</head>
<body>


    <h2>Hello {{ $userName }}</h2>
    <p>You requested to Reset password</p>
    <p>
        Click the link to reste your password
    </p>

    <a href="http://visitor_management_hj.test/admin/reset-password.php?token={{ $token }}&email={{ $email }}"> Reset Password</a>
    
</body>
</html>