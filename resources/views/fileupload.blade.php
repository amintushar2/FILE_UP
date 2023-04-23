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

    <form enctype="multipart/form-data" id="insertFile" >
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
    <span class="text-danger" id="file-input-error"></span>

  </div class="form-outline mb-4">

  <button type="submit" class="btn btn-primary btn-block mb-10" id ="addfile">Upload</button>
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
 
       
          </tbody>
       
        </table>

</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type='text/javascript'>
$(function() {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("#insertFile").submit(function(e) {
  e.preventDefault();
  const fd = new FormData(this);
  $("#addFile").text('Adding...');
  $.ajax({
    url: '{{ route('reg.store') }}',
    method: 'post',
    data: fd,
    cache: false,
    contentType:  false,
    processData: false,
    dataType: 'json',
     complete: function(response) {
      if (response.status == 200) {
              Swal.fire(
                'Added!',
                'Employee Added Successfully!',
                'success'
              )
              fetAllFileData();
              $("#insertFile")[0].reset();

            }
            }, 

  });
 
});
fetAllFileData();
function fetAllFileData(){

  $.get("{{ URL::to('show') }}", function(data){ 
    $('#memberBody').empty().html(data);

    $('#userTable').DataTable({
     
    });
                
                
            })
}


});


</script>





    
  </body>
</html>