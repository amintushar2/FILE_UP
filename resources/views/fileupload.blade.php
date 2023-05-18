<!DOCTYPE html>
<html lang="en">

<<<<<<< HEAD
<head>

=======
>>>>>>> 7bbb3642046e60c856f9237782cc8828e96bab86
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>My Website</title>

    <link rel="icon" href="./favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
        integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


        <style type="text/css">
    tfoot {
     display: table-header-group;
}
</style>

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


<div class="d-grid gap-3 mx-auto" style="width: 200px;margin-top: 20px">


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fileUploadModal">
            ADD FILE
        </button>

</div>
        


        <!-- Modal -->
        <div class="modal fade" id="fileUploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                    <form enctype="multipart/form-data" id="insertFile">
            @csrf
            <!-- Name input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="filename">Title</label>
                <input type="text" id="filename" class="form-control" name="file_name" value="{{old('file_name')}}" />
                <span class="text-danger">@error('file_name'){{$message}} @enderror</span>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="catagory">Catagory</label>
                <select id="catagory" class="form-control" name="catagory" value="{{old('catagory')}}">
                  <option value="All Factory License">All Factory License</option>
                  <option value="All Reports & Certificate">All Reports & Certificate</option>
                  <option value="All Policy & Procedure">All Policy & Procedure</option>
                </select>
                <span class="text-danger">@error('file_name'){{$message}} @enderror</span>
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="fileloc">Select File</label>
                <input type="file" id="fileloc" class="form-control" name="fileloc" />
                <span class="text-danger" id="file-input-error"></span>
            </div class="form-outline mb-4">
            <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-block " id="addfile">Upload</button>
                    </div>
        </form>





                    </div>
                    
                </div>
            </div>
        </div>

    
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
        <span>
            <h3 mb-4>File Details</h3>
        </span>
    </div>

    </div>

    <div class="mb-4">
        <span>

        </span>

    </div>

    <div class="container">
        <h1></h1>
        <table class="table table-striped" id="userTable" data-role="datatable">
            <thead>
                <tr>
                <th style="text-align: center; width: 192px;" class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">ID</th>
                <th style="text-align: center; width: 192px;" class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name</th>
                <th style="text-align: center; width: 192px;" class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Catagory: activate to sort column ascending">Catagory</th>
                <th style="text-align: center; width: 192px;" class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Size: activate to sort column ascending">Size</th>
        
                    <th scope="col">Download</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th rowspan="1" colspan="1"scope="col">ID</th>
                    <th rowspan="1" colspan="1"scope="col">Name</th>
                    <th rowspan="1" colspan="1"scope="col">Catagory</th>
                    <th rowspan="1" colspan="1"scope="col">Size</th>
                    <th rowspan="1" colspan="1"scope="col">Download</th>
                    <th rowspan="1" colspan="1"scope="col">Delete</th>
                </tr>
            </tfoot>
            <tbody id="memberBody">


            </tbody>
           
        </table>

    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
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
                url: '/store',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
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
                        $('#fileUploadModal').modal('hide');
                        $('.modal-backdrop').remove();



                    }
                },
                error: function(response) {
                    console.log(response);
                }

            });

        });
        fetAllFileData();

        function fetAllFileData() {

            $.get("{{ URL::to('show') }}", function(data) {
                $('#memberBody').empty().html(data);

                $('#userTable').DataTable({
                    "bPaginate": true,
            "bAutoWidth": true,
            "pageLength": 10,
			"fixedHeader": true,

                    initComplete: function() {
                        this.api()
                            .columns()
                            .every(function() {
                                var column = this;
                                var select = $(
                                        '<select><option value="">-</option></select>')
                                    .appendTo($(column.footer()).empty())
                                    .on('change', function() {
                                        var val = $.fn.dataTable.util.escapeRegex($(
                                            this).val());

                                        column.search(val ? '^' + val + '$' : '',
                                            true, false).draw();
                                    });

                                column
                                    .data()
                                    .unique()
                                    .sort()
                                    .each(function(d, j) {
                                        select.append('<option value="' + d + '">' +
                                            d + '</option>');
                                    });
                            });
                    },

                });


            })
        }


    });
    </script>






</body>

</html>