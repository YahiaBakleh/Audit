<p style="color: black;"> Dear {{$admin->name}}</p>
@if(@state=='created')
    <p style="color: black;">a new admin created <br><br>
    <p style="color: black;">Thank you to join our team member <br><br>
    You are now admin in : <br><br>
@else
    <p style="color: black;">yoyr data as admin has updated <br><br>
    Please Cheack : <br><br>
@endif
    <a href="https://basselsalehco.com/Admin"> https://basselsalehco.com/Admin</a>
</p>
<h3 style="color: black;"> User Name : {{$admin->username}}</h3>
<h3 style="color: black;"> Email :{{$admin->email}}</h3>
<h3 style="color: black;"> Password : {{$password}}</h3>
<p style="color: black;">I wish you all the best .<br>
    Best regards,<br><br>
    Bassel Saleh</p><br>

   <b> This is an automatically generated email. Please do not reply.</b>