@extends('layouts.app')
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.js'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css'>


    <style>
    .mainmenubtn {
      background-color: grey;
      color: white;
      border: none;
      cursor: pointer;
      padding:10px;
      margin-top: right;
    }
    .dropdown {
      position: relative;
      display: inline-block;
    }
    .dropdown-child {
      display: none;
      background-color: black;
      min-width: 200px;
    }
    .dropdown-child a {
      color: white;
      padding: 20px;
      text-decoration: none;
      display: block;
    }
    .dropdown:hover .dropdown-child {
      display: block;
    }
  </style>
</head>

@section('content')
<div class="container">
<body class="fixed-nav sticky-footer bg-dark">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            
                <div class="card-header">{{ __('All Products') }}</br><br>


              
                <div class="well">
            <div class="w3l-table-info">
                <table id="table" class="table">
                    <thead>
                    <tr>
                        <th class="text-center">Product Name</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Stock</th>
                        <th class="text-center">Images</th>
                        
                
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                        <td><button button id="btn" class="btn btn-link">{{$product['p_name']}}</button></td>
                        <td><button button id="btn" class="btn btn-link">{{$product['price']}}</button></td>  
                        <td><button button id="btn" class="btn btn-link">{{$product['stock']}}</button></td>  
                        <td><img src="{{asset($product->phPro->image ?? '')}}" alt="" width="150px"></td>    
       @endforeach
                    </tbody>
                </table>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>

                <div class="card-body">
                    <div class="panel-body">
                      <a href="{{route('admin')}}">Admin Panel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
</body>
</html>

