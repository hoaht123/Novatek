
@extends('client.layouts.master')
@section('title')
    <title>Information</title>
@endsection
@section('css')

@endsection
@section('content')  
<div class="header-empty-space"></div>  

<h1 class="text-center" style="font-size:30px;margin-top:50px">Information</h1>
<div class="tabs-block" style="margin-top:10px">
    <div class="tabulation-menu-wrapper text-center">
        <div class="tabulation-title simple-input">description</div>
        <ul class="tabulation-toggle">
            <li><a class="tab-menu active">Information</a></li>
            <li><a class="tab-menu">Change password</a></li>
            <li><a class="tab-menu">History order</a></li>
        </ul>
    </div>
    <div class="empty-space col-xs-b30 col-sm-b60"></div>

    <div class="tab-entry visible">
        <div class="row" style="display:block;margin-left:700px">
        <form action="{{URL::to('update_infor_user/'.$user->user_id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name: </label>
                <input type="text"  style="width:300px" name="user_name" value="{{$user->name}}"  class="form-control" placeholder="" >
              </div>
            <div class="form-group">
              <label for="">Email: </label>
              <input type="text" readonly style="width:300px" name="user_email" value="{{$user->email}}"  class="form-control" placeholder="" >
            </div>
            <div class="form-group">
                <label for="">Address: </label>
                <input type="text"  style="width:300px" name="user_address" value="{{$user->address}}" class="form-control" placeholder="" >
              </div>
            <div class="form-group">
                <label for="">Phone: </label>
                <input type="text" style="width:300px" name="user_phone"  value="{{$user->phone}}" class="form-control" placeholder="" >
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <?php
                $update_success = Session::get('update_success');
                if($update_success){
                    echo '<div style="color:green;font-size:15px">'.$update_success.'</div>';
                    Session::put('update_success', null);
                }
                ?>
        </div>
    </form>
    <div class="empty-space col-xs-b30 col-sm-b60"></div>
    </div>
    
    
    <div class="tab-entry">
        <form action="{{URL::to('change_password/'.$user->user_id)}}" method="post">
            <div class="row" style="display:block;margin-left:700px">
                    @csrf
                    <div class="form-group">
                        <label for="">Your password: </label>
                        <input type="password"  style="width:300px" name="old_password" value=""  class="form-control" placeholder="" >
                        <?php
                            $change_password = Session::get('change_password');
                            if($change_password){
                                echo '<div style="color:red;font-size:15px">'.$change_password.'</div>';
                                Session::put('change_password', null);
                            }
                        ?>
                    </div>         
                    <div class="form-group">
                      <label for="">New password: </label>
                      <input type="password" style="width:300px" name="new_password" value=""  class="form-control" placeholder="" >
                    </div>
                    <button type="submit" class="btn btn-primary">Change</button>
                    <?php
                            $change_password_success = Session::get('change_password_success');
                            if($change_password_success){
                                echo '<div style="color:green;font-size:15px">'.$change_password_success.'</div>';
                                Session::put('change_password_success', null);
                            }
                    ?>
                </div>
        </form>
        <div class="empty-space col-xs-b30 col-sm-b60"></div>
    </div>

    <div class="tab-entry">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-tripped">
                        <thead>
                            <tr>
                                <th>Order code</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $key=>$invoice)
                            <tr>
                                <td>{{$invoice->invoice_code}}</td>
                                <td>{{$invoice->created_at}}</td>
                                <td>Success</td>
                                <td><a href="{{URL::to('view_invoice_user/'.$invoice->invoice_id)}}">View in PDF</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="empty-space col-xs-b30 col-sm-b60"></div>
    </div>
</div>

@endsection
@section('js')
@endsection