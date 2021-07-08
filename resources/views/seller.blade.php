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
                <a class="btn btn-primary" type="submit" data-toggle="modal" data-target="#seller">+ Add Seller</a>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Admin Panel">
                    <a class="nav-link" href="admin">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Admin Panel</span>
                 </a>
                 </li>
                 </ul>

                 <a class="btn btn-dark" type="submit" data-toggle="modal" data-target="#myModal_seller">+ Add Seller</a>
                 <a class="btn btn-dark" type="button"  href="home">Dashboard</a>

            </div>
        </div>
        <!-- begin:modal Add Seller -->
        <div id="myModal_seller" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content" >
                <text-align:center>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Add Seller</h3><br>
                        </div>
               
                    <div class="modal-body" >
                        <form class="form-horizontal" method="POST" action="seller"  enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Seller Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="s_name" class="form-control" id="name" placeholder="Enter Seller Name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Seller Surname</label>
                                <div class="col-sm-9">
                                    <input type="text" name="s_surname" class="form-control" id="name" placeholder="Enter Seller Surname" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Seller Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" name="s_phone" class="form-control" id="name" placeholder="Enter Seller Phone" required>
                                </div>
                            </div>

                            <div class="form-group" >
                            <form runat="server">
                            <input accept="image/*" type='file' id="imgInp" name="image" class="form-control" width="150px"/>
                                <img id="blah" src="#" alt="Selected Image" />
                            </div>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Submit">
                            </form>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-hover btn-primary btn-sm" data-dismiss="modal">Close</button>
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
                        
                        <th class="text-center">Seller Name</th>
                        <th class="text-center">Seller Surname</th>
                        <th class="text-center">Seller Phone</th>
                        <th class="text-center">Images</th>
                        <th class="text-center">Options</th>
                
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sellers as $seller)
                        <tr>
                        
                        <td><button button id="btn" class="btn btn-link">{{$seller['s_name']}}</button></td>
                        <td><button button id="btn" class="btn btn-link">{{$seller['s_surname']}}</button></td>
                        <td><button button id="btn" class="btn btn-link">{{$seller['s_phone']}}</button></td>   

                        <td><img src="{{asset($seller->phSell->image ?? '')}}" alt="" width="150px"></td>      
                        <td><a href = {{"delete2/" .$seller['id']}}>Delete</a></td>   


                                <td class="text-center">
                                <div class="row">
                                        <div class="col-md-6">
                                            <a href="{!! route('seller.updateS',$seller->id) !!}">Update</a>
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
    imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>