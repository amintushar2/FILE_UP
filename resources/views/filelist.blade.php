@foreach($files as $file)

<tr>
  <td width=10% >{{ $file->id}}</td>
  <td width=50%>{{$file->file_title}}</td>
<<<<<<< HEAD
  <td width=50%>{{$file->catagory}}</td>
=======
>>>>>>> 7bbb3642046e60c856f9237782cc8828e96bab86
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