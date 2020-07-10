<html>
<head></head>
<style>
    p ,h3{
        color: black;
    }

</style>
<body >
<p> Dear Bassel Saleh</p>
<p> you have a new Message , here are the Details : </p>

                <label><strong> Name :  </strong> {{$letter->name}}</label><br>
                <label><strong> Email :  </strong> {{$letter->email}}</label><br>
                <label><strong> Phone Number :  </strong> {{$letter->phone_number}}</label><br>
                <label><strong> Message :  </strong> {{$letter->message}}</label><br>


<p>Best regards,<br><br>
HR Department</p><br>

<b> This is an automatically generated email. Please do not reply.</b>
</body>
</html>