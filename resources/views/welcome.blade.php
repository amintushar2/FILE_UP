<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>My Website</title>
    
    <link rel="icon" href="./favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>






</head>
  <body>

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
<table class="table table-striped" id="userTable" data-role="datatable">
          <thead>
            <tr >
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Size</th>
              <th scope="col">Download</th>
              <th scope="col">Delete</th>

            </tr>
          </thead>
        
          <tbody id ="memberBody">
 
          @foreach($files as $file)

<tr>
  <td width=10% >{{ $file->id}}</td>
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




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type='text/javascript'>


$(document).ready(function () {
    $('#userTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,

    });
});
</script>





    
  </body>
</html>