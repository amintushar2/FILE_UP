<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Website</title>
    
    <link rel="icon" href="./favicon.ico" type="image/x-icon">

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <meta http-equiv="refresh" content="30">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">



</head>
  <body onLoad="set_interval(); document.form1.exp_dat.focus();">
   <div class="container">
<div>


<div class ="container">
<h1></h1>
@if( Session::get('status'))
  <div class="alert alert-success">
    {{Session::get('status')}}
  </div>
  @endif
  @if(Session::get('eror'))
  <div class="alert alert-danger">
    {{Session::get('eror')}}
  </div>
  @endif
  @if(Session::get('noque'))
  <div class="alert alert-success">
    {{Session::get('noque')}}
  </div>
  @endif

<table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Size</th>
              <th scope="col">action</th>

            </tr>
          </thead>
          <tbody>
         
          @foreach($smssent as $sms)
              <tr>
             
                <td >{{$sms->mobile_no}}</td>
                <td >{{$sms->sms_text}}</td>
                <td > {{$sms->status}} </td>
                <td > {{$sms->out_date}} </td>
                <td >  <a href="{{route('s.smsapi')}}"> </td>
       
                
          

                </button> 
              
              </tr>
              @endforeach
          </tbody>
        </table>

</div>

 
  </body>


  <script language="JavaScript">
function set_interval() {
  //the interval 'timer' is set as soon as the page loads  
  var timeoutMins = 1000 * 1 * 15; // 15 seconds
  var timeout1Mins = 1000 * 1 * 13; // 13 seconds
  itimer=setInterval("auto_logout()",timeoutMins);

}




function auto_logout() {
  //this function will redirect the user to the logout script
  window.open('smssends', '_self');
}
</script>
</html>