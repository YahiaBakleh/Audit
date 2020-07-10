<html>
<head></head>
<style>
    p ,h3{
        color: black;
    }

</style>
<body >
<p> Dear {{$user->name}},</p>
<p>Congratulations!</p>
<p>You have completed the first step in our recruitment process successfully. In order to proceed with our recruitment process, you must do the following:
<br>
    @if(count($Tests)>0)
        <ul>
            @foreach($Tests as $Test)
                <li>{{$Test->name}} , Duration: {{$Test->time}} </li>
            @endforeach
        </ul>
    @endif 
<p>Below is the login information for your assessment : </p> 

  <p><b>Website : </b> <a href="https://basselsalehco.com"> https://basselsalehco.com</a></p>
</p>
<p>
    
<b>Candidate Email:</b>{{$user->email}}<br>
<b>Password :</b> {{$password}}

</p>
<p><b>Important Information </b><br>
<p>You must complete each test in one sitting. Do not logout or click back on your browser once you access the test.</p>
<p>You need to complete the test within 24 hours to continue your application to BASSEL SALEH & CO. We will contact you shortly after the completion of the test to advise you of the outcome.</p>
<p>Do not exit or minimize exam browser tab or switch to another application during the assessment because instant notification will be sent to HR Dept. </p>

   Thank you ,<br>
   HR Department</p><br>

<b> This is an automatically generated email. Please do not reply.</b>
</body>
</html>