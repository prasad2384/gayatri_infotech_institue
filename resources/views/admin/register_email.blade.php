<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Dear <b>{{$stdname}}</b>,</p>
    <p>Your Registration is Successfully Completed, You Apply Any Course</p>
    <p>Username: <b>{{$std_email}}</b></p>
    <p>Password: <b>{{$std_password}}</b></p>
    <p>Note :  Please note the difference between 0 (Zero) and o (letter), 5 (Five) and S (letter), 2(Two) and Z (letter) while using the Password.</p>
    <p><b>Please Keep the username and Password safely</b></p>
    <p><b>Your Application details are as follows:-</b><br>
    Name : {{$stdname}}<br>
    Date of Birth : {{$std_dob}}<br>
    Gender :{{$std_gender}}<br>
    Mobile no : {{$std_phoneno}}</p>
</body>
</html>