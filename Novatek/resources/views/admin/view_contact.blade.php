@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">CONTACT / VIEW</div>
<h2 class="text-center">VIEW CONTACT</h1>
<div class="table-responsive" style="margin-top:50px; text-align:center">
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $i = 1;
            ?>
            @foreach($contacts as $key=>$contact)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$contact->contact_name}}</td>
                <td>{{$contact->contact_phone}}</td>
                <td>{{$contact->contact_email}}</td>
                <td>{{$contact->contact_message}}</td>
            </tr>
            @endforeach
      </tbody>
    </table>
  </div>
  @endsection