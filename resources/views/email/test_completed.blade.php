<html>
<head></head>
<style>
    p ,h3{
        color: black;
    }

</style>
<body >
<p> Dear Bassel Saleh </p>
<p>We want to confirm you that a new user has completed a new test , .<br><br>
   we will list all the information below , please visit this url to show all the results in detail<br><br>
    <a href="{{route('users.show' , ['user' => $user])}}">Link for more detail</a>
</p>
<h3> User Name : {{$user->name}}</h3>
<h3> Email :{{$user->email}}</h3>
    <br>

    Best regards,<br><br>
    HR Department</p><br>

   <b> This is an automatically generated email. Please do not reply.</b>
</body>
</html>