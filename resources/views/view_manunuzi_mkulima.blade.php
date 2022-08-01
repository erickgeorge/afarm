@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manunuzi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Manunuzi</li>
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



                        <!-- /.col -->
          <div class="container">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
               <!--    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> -->
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">New User</a></li>
{{--                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Change Password</a></li>--}}
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">



                  <div class="active tab-pane" class="tab-pane" id="settings">
                    <form method="POST" action="{{route('newuser')}}">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="User Name"  name="name" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail" placeholder="First Name"  name="fname" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Last Name"  name="lname" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputExperience" placeholder="Phone Number"  name="phone" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputSkills" placeholder="Email" required name="email">
                        </div>
                      </div>
                         <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                           <select name="role" class="custom-select form-control" id="exampleSelectBorder" required>
                                <option value="">Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="SuperAdmin">Super Admin</option>
                            </select>
                        </div>
                      </div>


                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->



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
                    <th>Aina ya Mazao</th>
                     <th>Mazao</th>
                    <th>Mkoa</th>
                    <th>Kipimo</th>
                    <th>Bei Kwa Kipimo</th>
                    <th>Taarifa Zaidi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                  @foreach($taarifa as $taarifa)
                    <?php $i++; ?>

                  <tr>
                   <td>{{$i}}</td>
                   <td>{{$taarifa['weight']['crop']['cropcategory']->category_name}}</td>
                   <td>{{$taarifa['weight']['crop']->crop_name}}</td>
                   <td>{{$taarifa['weight']['location_region']->region_name}}</td>
                   <td>{{$taarifa['weight']['crop']['measurementcategory']->category_name}}</td>
                   <td>Bei</td>
                   <td><a title="Taarifa za Mkulima" href="{{route('view_manunuzi',[$taarifa->id])}}"><i class="fas fa-eye"></i></a></td>
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

@endsection
