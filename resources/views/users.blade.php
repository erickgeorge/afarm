@extends('layouts.app')

@section('content')

@if(auth()->user()->role == 'SuperAdmin')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


              @if (session('message'))
                  <div class="alert alert-success" role="alert">
                      {{ session('message') }}
                  </div>
              @endif

            <div class="card">
              <div class="card-header">

                      <a href="{{route('add_user')}}"> <button type="submit" class="btn btn-primary btn-block"> Add User</button></a>

                <!-- <h3 class="card-title">DataTable with default features</h3> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>UserName</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                  @foreach($user as $user)
                    <?php $i++; ?>

                  <tr>
                      <td>{{$i}}</td>
                      <td>{{$user->fname}} {{$user->lname}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->phone}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->role}}</td>
                      <td class="row">
                          <button title="View"  style="color: darkgreen;"><a href="{{route('view_user',[$user->id])}}" ><i class="fas fa-eye"></i></a></button>&nbsp;
                         @if($user->role != 'SuperAdmin')
                          <form method="POST" action="{{route('deleteuser',[$user->id])}}"
                                onsubmit="return confirm('Are you sure you want to Delete ?')">
                              @csrf
                              <button  type="submit"
                                       title="Delete" data-toggle="tooltip" style="color: red;">  <i  class="fas fa-trash-alt"></i></button>
                          </form>
                          @endif
                      </td>
                  </tr>

                  @endforeach

                  </tbody>
                  <tfoot>

                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endif
@endsection
