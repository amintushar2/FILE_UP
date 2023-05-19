@foreach($files as $file)

<tr>
  <td width=10% >{{ $file->id}}</td>
  <td width=50%>{{$file->file_title}}</td>
  <td width=50%>{{$file->catagory}}</td>
  <td >{{$file->file_size}} MB</td>
  <td width=10%>
  <a href="{{route('t.downfile',$file->id)}}"class="btn btn-outline-primary">
  <i class="bi bi-cloud-download-fill"></i>  Downlod</a></td>
  <td width=10%>


    <button type="submit" class="btn btn-outline-danger"data-id="{{$file->id}}" id="deleteFile">Delete </button>
 </td>
</tr>
@endforeach
