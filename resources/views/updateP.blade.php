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
            <div class="table-heading">
                <h2>Update Photo</h2>
            </div>
            <!-- Form start Start -->
            <div class="panel panel-widget forms-panel">
                <div class="forms" >
                    <div class=" form-grids form-grids-right">
                        <div class="widget-shadow " data-example-id="basic-forms">
                            <div class="form-title">
                                <h4 class="text-center">Add Photo Information:</h4>
                            </div>
                            <div class="form-body">
                                <form class="form-horizontal" method="POST" action="{!! route('photo.edit',$photo->id) !!}" id="">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Table Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="table_name" class="form-control" id="name" value="{{$photo->table_name}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Table ID </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="table_id" class="form-control" id="name" value="{{$photo->table_id}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Image </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="image" class="form-control" id="name" value="{{$photo->image}}" required>
                                        </div>
                                    <br>
                                    <input class="btn btn-primary" type="submit" value="Update">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>