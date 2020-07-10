
<p style="color: black;"> Dear {{$user->name}},</p>

<p>Below is the login information for your assessment : </p> 

  <p><b>Test Link :</b> <a href="https://basselsalehco.com/login"> https://basselsalehco.com/login</a></p>
</p>
<p>
    
<b>Candidate Email:</b>{{$user->email}}<br>
<b>Password :</b> {{$password}}

</p>
<p><b>Important Information </b><br>
<p>You must complete each test in one sitting. Do not logout or click back on your browser once you access the test.</p>
<p>You need to complete the test within 4 hours.</p>
<p>Do not exit or minimize exam browser tab or switch to another tab/application during the assessment because instant notification will be sent to HR Dept. </p>

   Thank you ,<br>
   HR Department</p><br>

<b> This is an automatically generated email. Please do not reply.</b>
</body>
</html>