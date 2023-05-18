<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FOUR DESIGN </title>
    
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
 
<div class="container d-flex justify-content-center">
<h1>Four Design All Document</h1>
</div>
 <span> </span>
 <span> </span>
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

                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th rowspan="1" colspan="1"scope="col">ID</th>
                    <th rowspan="1" colspan="1"scope="col">Name</th>
                    <th rowspan="1" colspan="1"scope="col">Catagory</th>
                    <th rowspan="1" colspan="1"scope="col">Size</th>
                    <th rowspan="1" colspan="1"scope="col">Download</th>
                </tr>
            </tfoot>
            <tbody id="memberBody">


            </tbody>
           
        </table>

    </div>


 
  </body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
  <script>
    $(function() { 



      fetAllFileData();

function fetAllFileData() {

    $.get("{{ URL::to('show-user') }}", function(data) {
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
</html>