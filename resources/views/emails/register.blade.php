<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anon</title>
</head>
<body>
    <table>
        <tr><td>Dear {{ $name }}</td></tr>
        <tr><td>$nbsp</td></tr>
        <tr><td>Welcome to Anon. Your account has been successfully created with below information:</td></tr>
        <tr><td>$nbsp</td></tr>
        <tr><td>Name: {{ $name }}</td></tr>
        <tr><td>$nbsp</td></tr>
        <tr><td>Mobile: {{ $mobile }}</td></tr>
        <tr><td>$nbsp</td></tr>
        <tr><td>Email: {{ $email }}</td></tr>
        <tr><td>$nbsp</td></tr>
        <tr><td>Password: ****** (as chosen by you</td></tr>
        <tr><td>$nbsp</td></tr>
        <tr><td>$nbsp</td></tr>
        <tr><td>Thanks & Regards,</td></tr>
        <tr><td>Anon</td></tr>
    </table>
</body>
</html>