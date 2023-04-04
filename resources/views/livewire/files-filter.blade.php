<div>

    <div class="container">
         <div class="row mt-5">

              <div class="col-md-12 panel-body table-responsive">
                    <!-- Search box -->
                    <input type="text" class="form-control input-sm float-right" placeholder="Search Name or id" style="width: 300px; align : right;" wire:model="searchTerm" >

                    <!-- Paginated records -->
                    <table class="table">
                         <thead>
                              <tr>
                                  <th class="sort" wire:click="sortOrder('id')">ID {!! $sortLink !!}</th>
                                  <th class="sort" wire:click="sortOrder('file_title')">File Name {!! $sortLink !!}</th>
                                  <th class="sort" wire:click="sortOrder('file_size')">File Size {!! $sortLink !!}</th>
                                  <th>Download</th>
                              </tr>
                         </thead>
                         <tbody>
                              @if ($file_search->count())
                              @foreach($file_search as $file)

                                <tr>
                                <td width=10%>{{ $file->id}}</td>
                                <td width=60%>{{$file->file_title}}</td>
                                <td width=15%>{{$file->file_size}} MB</td>
                                <td width=15%> <button class="btn btn-outline-primary mb-10">
                                <a href="{{route('t.downfile',$file->id)}}">
                                 <i class="bi bi-cloud-download-fill"></i>  Downlod</a></td>

                                </button> 

                                    </tr>
                                @endforeach
                              @else
                                   <tr>
                                        <td colspan="5">No record found</td>
                                   </tr>
                              @endif
                         </tbody>
                    </table>

                    <!-- Pagination navigation links -->
                    {{$file_search->links()}}
              </div>

         </div>
    </div>

</div>
