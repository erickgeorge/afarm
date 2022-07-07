@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pending Approval</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Pending</li>
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
                <!-- <h3 class="card-title">DataTable with default features</h3> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Jina la mkulima </th>
                    <th>Namba ya simu</th>
                    <th>Jina la mwenyekiti</th>
                    <th>Simu ya mwenyekiti</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                     <?php $i=0; ?>
                  @foreach($user_farm as $user)
                   <?php $i++; ?>
                  @if($user['users']->is_active == 0)
                  <tr>
                   <td>{{$i}}</td>
                    <td>{{$user->first_name}}&nbsp;&nbsp;{{$user->last_name}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{$user['farmer']->full_name}}</td>
                    <td>{{$user['farmer']->phone_number}}</td>
                    <td>{{$user['location']->village_name}} , {{$user['location']['location_district']->district_name}}
                        , {{$user['location']['location_district']['location_region']->region_name}}</td>
                    <td>Pending</td>
                    <td class="row">
                      <form method="POST" action="{{route('approve_user',[$user->user_id])}}"
                      onsubmit="return confirm('Are you sure you want to Approve ?')">
                          @csrf
                      <button  type="submit"
                        title="Approve" data-toggle="tooltip" style="color: darkgreen;"><i class="fas fa-check"></i></button>
                      </form>

                      &nbsp;
                      <form method="POST"
                      onsubmit="return confirm('Are you sure you want to Delete ?')">
                      <button  type="submit"
                        title="Delete" data-toggle="tooltip" style="color: red;">  <i  class="fas fa-trash-alt"></i></button>
                      </form>
                     </td>

                  </tr>
                  @endif
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

@endsection
