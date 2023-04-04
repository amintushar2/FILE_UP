<!DOCTYPE html>
<html lang="en">
  <head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Website</title>
    
    <link rel="icon" href="./favicon.ico" type="image/x-icon">

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">




    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">



</head>
  <body>
   <div class="container">
<div>
@if( Session::get('status'))
  <div class="alert alert-success">
    {{Session::get('status')}}
  </div>
  @endif
  @if(Session::get('failed'))
  <div class="alert alert-denger">
    {{Session::get('failed')}}
  </div>
  @endif
</div>

    <form action="{{route('reg.store')}}" method="post" enctype="multipart/form-data">
@csrf
  <!-- Name input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="filename">Title</label>
    <input type="text" id="filename" class="form-control" name ="file_name" value="{{old('file_name')}}" />
    <span class="text-danger">@error('file_name'){{$message}} @enderror</span>              

  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="fileloc">Select File</label>
    <input type="file" id="fileloc" class="form-control" name="fileloc"/>
    
  </div class="form-outline mb-4">

  <button type="submit" class="btn btn-primary btn-block mb-10">Upload</button>
  </div>
 <div class="container justify-content-center" style="margin-top : 20px">
 @if( Session::get('delet'))
  <div class="alert alert-success">
    {{Session::get('delet')}}
  </div>
  @endif
  @if(Session::get('deletef'))
  <div class="alert alert-danger">
    {{Session::get('deletef')}}
  </div>
  @endif


 </div>


  <div class="container d-flex justify-content-center" style="margin-top : 20px">
  <span> <h3 mb-4>File Details</h3></span>
  </div>
  
  
  

  

</form>
   </div>

   <div class="mb-4">
   <span>

</span>

   </div>

<div class ="container">
<h1></h1>
<table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Size</th>
              <th scope="col">Download</th>
              <th scope="col">Delete</th>

            </tr>
          </thead>
          <tbody>
            @foreach($files as $file)

              <tr>
                <td width=10%>{{ $file->id}}</td>
                <td width=50%>{{$file->file_title}}</td>
                <td >{{$file->file_size}} MB</td>
                <td width=10%> <button class="btn btn-outline-primary mb-10">
                <a href="{{route('t.downfile',$file->id)}}">
                <i class="bi bi-cloud-download-fill"></i>  Downlod</a></td>
                <td width=10%> <button type="button" class="btn btn-outline-danger">
                <a href="{{route('f.del',$file->id)}}">
                Delete</a></td>

                </button> 
              
              </tr>
            @endforeach
          </tbody>
        </table>

</div>

 
  </body>
</html>