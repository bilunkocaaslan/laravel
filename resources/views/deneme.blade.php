<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.js'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css'>
</head>
<div class="main-grid">
    <div class="agile-grids">
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-primary" type="submit" data-toggle="modal" data-target="#mark">+ Add Mark</a>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
                    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Admin Panel">
                            <a class="nav-link" href="admin">
                                <i class="fa fa-fw fa-dashboard"></i>
                                <span class="nav-link-text">Admin Panel</span>
                            </a>
                        </li>
                    </ul>

                    <a class="btn btn-dark" type="submit" data-toggle="modal" data-target="#myModal_mark">+ Add Mark</a>
                    <a class="btn btn-dark" type="button" href="home">Dashboard</a>

            </div>
        </div>
        <!-- begin:modal Add Seller -->
        <div id="myModal_mark" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Add Mark</h3>
                            <br>
                        </div>

                        <div class="modal-body">
                            <form id='addMrk' class="form-horizontal" method="POST" action="mark"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Mark Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="m_name" class="form-control" id="m_name"
                                            placeholder="Enter Mark Name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    
                                        <input accept="image/*" type='file' id="imgInp" name="image"
                                            class="form-control" width="150px" />
                                        <img id="blah" src="#" alt="Selected Image" />
                                </div>
                                <br>
                                <input class="btn btn-primary form-control" type="submit" value="Submit">
                            </form>
                          
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-hover btn-primary btn-sm"
                                data-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
        </div>
        <!-- End:modal Add Seller -->
        <hr>
        <div class="well">
            <div class="w3l-table-info"> 
                <table id="table" class="table">
                    <thead>
                        <tr>

                            <th class="text-center">Mark Name</th>
                            <th class="text-center">Images</th>
                            <th class="text-center">Options</th>

                        </tr>
                    </thead>
                    <tbody id='bilun'>
                        @foreach ($marks as $mark)
                            <tr>
                                <td><button button id="btn" class="btn btn-link">{{ $mark['m_name'] }}</button></td>

                                <td><img src="{{ asset($mark->phMrk->image ?? '') }}" alt="" width="150px"></td>
                                <td><button button id="deleteBtn" class="btn btn-link">Delete</button></td>
                                
                                <td class="text-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{!! route('mark.uppdate', $mark->id) !!}">Update</a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </body>
            </div>
        </div>
    </div>
</div>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#addMrk').submit(function(e) {
        e.preventDefault();

        let formData = new FormData(this);

         $.ajax({
            url: "{{ route('mark.store') }}",
            type: 'POST',
            data: formData,
            headers: {
                '_token': '{{ csrf_token() }}'
            },

            cache: false,
            contentType: false,
            processData: false,

            success: function(data){
                swal("Mark added successfully!", "", "success");
             console.log(data);

                $('#myModal_mark').modal('hide');
                
                $('#bilun').append(
                    "<td>"+"<button button id='btn' class='btn btn-link'>"+data.m_name+"</button>"+"</td>"+
                    "<td>"+"<img src="+data.images+" width='150px'>"+"</td>"+
                    "<td>"+"<a href={{ 'delete/' . $mark['id'] }}>Delete</a>"+
                    "<td>"+"<a href='{!! route('mark.uppdate', '$mark->id') !!}''>Update</a>"

                );
            },
        })

});
</script>
<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#deleteBtn').click(function(e) {
        e.preventDefault();
        let id=$(this).data("m_id");

         $.ajax({
            url: "{{ route('mark.delete') }}",
            type: 'POST',
            data: {id:m_id},
            headers: {
                '_token': '{{ csrf_token() }}'
            },

            cache: false,
            contentType: false,
            processData: false,

            success: function(data){

                swal("Mark deleted successfully!", "", "success");
                console.log(data);

            });

});
</script>


