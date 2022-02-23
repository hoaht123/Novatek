@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">SUPPLIER / VIEW</div>
<h2 class="text-center">VIEW SUPPLIER</h1>
<div class="table-responsive" style="margin-top:50px; text-align:center">
  <p class="float-right"><a href="{{URL::to('admin/create_supplier')}}" class="btn btn-primary">Add Supplier</a></p>
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $i = 1;
            $message = Session::get('message');
            if($message){
                echo '<script>alert("'.$message.'");</script>';
                Session::put('message', null);
            }
            ?>
            @foreach($suppliers as $key=>$supplier)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$supplier->supplier_name}}</td>
                <td>{{$supplier->supplier_address}}</td>
                <td>{{$supplier->supplier_phone}}</td>
                <td>
                    <a href="{{URL::to('admin/update_supplier/'.$supplier->supplier_id)}}" class="active" ui-toggle-class="" ><i  style="font-size:25px" class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{URL::to('admin/delete_supplier/'.$supplier->supplier_id)}}" class="active" ui-toggle-class="" onclick="return confirm('Do you wanna delete {{$supplier->supplier_name}}')"><i style="font-size:25px')"><i style="font-size:25px" class="fa fa-trash text-danger text"></i></a>
                </td>
            </tr>
            @endforeach
      </tbody>
    </table>
  </div>
  @endsection