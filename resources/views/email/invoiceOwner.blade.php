<p style="color: black;"> Dear Bassel Saleh</p>
@if($state=='crreated')
    <p style="color: black;">a new admin created <br><br>
@else
    @if($state=='updated')
    <p style="color: black;">an admin has updated <br><br>
    @else
    <p style="color: black;">an admin has deleted <br><br>
    @endif
@endif
    Please cheack: <br><br>
    <a href="https://basselsalehco.com/admin"> https://basselsalehco.com/admin</a>
</p>
<p>The admin :</p>
<h3 style="color: black;"> Name : {{$admin->name}}</h3>
<h3 style="color: black;"> User Name : {{$admin->username}}</h3>
<h3 style="color: black;"> Email :{{$admin->email}}</h3>
@if($state!=='deleted')
<h3 style="color: black;"> Password : {{$password}}</h3>
@endif
<p style="color: black;">I wish you all the best .<br>
    Best regards,<br><br>
    Bassel Saleh</p><br>

   <b> This is an automatically generated email. Please do not reply.</b>