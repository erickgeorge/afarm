@extends('layouts.app')

@section('content')



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">


              @if (session('message'))
                  <div class="alert alert-success" role="alert">
                      {{ session('message') }}
                  </div>
              @endif
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
               </div>
              @endif

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/AdminLTELogo.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$myprofile->name}}</h3>

                <p class="text-muted text-center">{{$myprofile->role}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>{{$myprofile->fname}}</b> 
                  </li>
                  <li class="list-group-item">
                    <b>{{$myprofile->lname}}</b> 
                  </li>
                  <li class="list-group-item">
                    <b>{{$myprofile->email}}</b> 
                  </li>
                </ul>

            
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

    
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
               <!--    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> -->
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">User Details</a></li>
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Change Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
              
      

                  <div class="tab-pane" class="tab-pane" id="settings">
                    <form method="POST" action="{{route('update_user',[$myprofile->id])}}">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="User Name" value="{{$myprofile->name}}" name="name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail" placeholder="First Name" value="{{$myprofile->fname}}" name="fname">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Last Name" value="{{$myprofile->lname}}" name="lname">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputExperience" placeholder="Phone Number" value="{{$myprofile->phone}}" name="phone">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input disabled type="email" class="form-control" id="inputSkills" placeholder="Email" value="{{$myprofile->email}}" name="email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Added On</label>
                        <div class="col-sm-10">
                          <input disabled class="form-control" id="inputExperience" placeholder="Experience" value="{{date('d F Y', strtotime($myprofile->created_at))}}">
                        </div>
                      </div>
                 
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->



                  <div class="active tab-pane" class="tab-pane" id="timeline">
                    <form method="POST" action="{{route('changepass',[$myprofile->id])}}">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputName" placeholder="Old Password" required name="oldpass">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputEmail" placeholder="New Password" required name="newpass">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                          <input type="Password" class="form-control" id="inputName2" placeholder="Confirm Password" required name="confirmpass">
                        </div>
                      </div>
                     
                    
                   
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Submit</button>
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
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection
