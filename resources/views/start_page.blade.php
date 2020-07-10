<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BASSEL SALEH & CO</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/css/mdb.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
    <style>body, html {
            height: 100%;
        }

        body {
            /* The image used */
            background-image: url("https://mdbootstrap.com/img/Photos/Others/images/78.jpg");

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }</style>
</head>

<body>
<!-- Start your project here-->


    <div class="container-fluid">

        <div style="height: 70vh">

            <div class="col-lg-12" style="margin-top: 20px;">


                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title text-center"><b>Welcome - {{Auth::user()->name}}</b></h5><br>

                        <h5 class="style="font-family: 'Libre Baskerville', serif;"><b> Test Description </b></h5>
                        <div ><p class="card-text">  {!! $test->description !!}.</p></div>
                        <h5 style="font-family: 'Libre Baskerville', serif;"><b> Test Instructions </b> </h5>
                        <div ><p class="card-text">  {!! $test->instructions !!}.</p></div>
                        <div>
                        <a href="{{ action('HomeController@showTest', $test->id) }}" class="btn btn-success">Start The Test</a>
                    </div>
                    </div>
                </div>



                <!-- Card -->
            </div>
        </div>
    </div>



<!-- /Start your project here-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/js/mdb.min.js"></script>
<script type="text/javascript">

    // var tDuration = "{{$test->time}}";
    // console.log('Duration as time = '+ tDuration );
    // var s= tDuration.split(':');
    // var duration = s[2]=='00'? s[0] * 3600 + s[1] * 60 : s[0] * 3600 + s[1] * 60 + s[2];
    // console.log('Duration as as sec = '+ duration );
//    console.log(name);
    // $('a').on('click',function(e){
        //if there are session with testName         
        // if(sessionStorage.getItem('{{$test->name}}')){
        //     //True : reset it to it self 
        //     sessionStorage.setItem('{{$test->name}}',sessionStorage.getItem('{{$test->name}}'));
            //// console.log('session was set');
        // }else
        // {
            // sessionStorage.setItem('{{$test->name}}',duration);
            // var sTime = new Date().getTime();
            // var fTime = sTime + duration;
            // sessionStorage.setItem('sTime',sTime);
            // sessionStorage.setItem('fTime',fTime);
            //// Fasle : create new on  
            // var sTime = new Date().getTime();
            // var fTime = sTime + duration;
            // sessionStorage.setItem('{{$test->name}}',fTime);
            // console.log('session set');
            ////var show = sessionStorage.getItem('{{$test->name}}');
            ////  console.log(sessionStorage.getItem('{{$test->name}}'));
        // }
    // });

function getDiff(){
    
        if(localStorage.getItem("{{Auth::user()->name}}.{{Auth::user()->id}}.{{$test->name}}.{{$test->id}}.sTime")){
            var startTime = localStorage.getItem("{{Auth::user()->name}}.{{Auth::user()->id}}.{{$test->name}}.{{$test->id}}.sTime");
            var duration  = localStorage.getItem("{{Auth::user()->name}}.{{Auth::user()->id}}.{{$test->name}}.{{$test->id}}.duration");
            // localStorage.setItem('startedTime',startedTime);
            //end
            var timeNow = new Date(); 
            // durationStay = duration Stay in test page
            var durationStay=  timeNow.getTime() - startTime;
            durationStay=durationStay/1000;
            console.log('durationStay : '+durationStay);
            if(duration>durationStay){
            var diff = duration - durationStay ;
            }else{
              var diff = 0;
              window.location.href="https://www.basselsalehco.com/home/"
            }
            console.log('diff in if true'+diff);
            // return diff; 
            localStorage.setItem("{{Auth::user()->name}}.{{Auth::user()->id}}.{{$test->name}}.{{$test->id}}.DiffTime",diff);
        }else{
            var time = "{{$test->time}}";
            var s= time.split(':');
            var duration = s[2]=='00'? s[0] * 3600 + s[1] * 60 : s[0] * 3600 + s[1] * 60 + s[2];
            var sTime = new Date().getTime(); 
            localStorage.setItem("{{Auth::user()->name}}.{{Auth::user()->id}}.{{$test->name}}.{{$test->id}}.duration",duration);
            localStorage.setItem("{{Auth::user()->name}}.{{Auth::user()->id}}.{{$test->name}}.{{$test->id}}.sTime",sTime);
            var diff = duration ;
            console.log('diff in if false'+diff);
            // return diff; 
            localStorage.setItem("{{Auth::user()->name}}.{{Auth::user()->id}}.{{$test->name}}.{{$test->id}}.DiffTime",diff);
        }    
    
}
   
$('a').on('click',function(e){
    e.preventDefault();
    var SiteURL='https://basselsalehco.com/home/tests/'+"{{$test->id}}" ;
    console.log(SiteURL);
    getDiff();
     var popup = window.open(SiteURL, "myPopup", 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,addressbar=0,width=1400,height=1600');
    // if(localStorage.getItem("{{$test->name}}.{{$test->id}}.DiffTime")){
    //     var diff =localStorage.getItem("{{$test->name}}.{{$test->id}}.DiffTime");
    //     localStorage.setItem("{{$test->name}}.{{$test->id}}.DiffTime",diff);
    // }else{
    //     var diff = getDiff();
    //     localStorage.setItem("{{$test->name}}.{{$test->id}}.DiffTime",diff);
    // }
    
    
});

// document.addEventListener('contextmenu', function(e) {
//     e.preventDefault();
// });
    
</script>
</body>

</html>
