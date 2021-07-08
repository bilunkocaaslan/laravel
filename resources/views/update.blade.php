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
                <h2>Update Product</h2>
            </div>
            <!-- Form start Start -->
            <div class="panel panel-widget forms-panel">
                <div class="forms" >
                    <div class=" form-grids form-grids-right">
                        <div class="widget-shadow " data-example-id="basic-forms">
                            <div class="form-title">
                                <h4 class="text-center">Update Product Information:</h4>
                            </div>
                            <div class="form-body">
                                <form class="form-horizontal" method="POST" action="{!! route('product.edit',$product->id) !!}" enctype="multipart/form-data" id="">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="p_name" class="form-control" id="name" value="{{$product->p_name}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Price </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="price" class="form-control" id="price" value="{{$product->price}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Stock</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="stock" class="form-control" id="stock" value="{{$product->stock}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                                        
                                        <div class="col-sm-9">
                                        <input accept="image/*" type='file' id="imgInp" name="image" class="form-control" width="150px" />
                                        <img id="blah" src="#" alt="Selected Image" />
                                        </div>
                                    </div>
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

    <script>
    imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>