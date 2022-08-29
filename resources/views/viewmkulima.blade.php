@extends('layouts.app')

@section('content')



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="container">
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

         
       </div>
          </div>
          <!-- /.col -->
          <div class="container">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
               <!--    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> -->
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Edit Mkulima</a></li>
{{--                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Change Password</a></li>--}}
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">



                  <div class="active tab-pane" class="tab-pane" id="settings">
                    <form method="POST" action="{{route('edit_mkulima', [$mkulima->id])}}">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Jina la kwanza</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Jina la kwanza"name="fname" value="{{$mkulima['farmer']->first_name}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Jina la pili</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail" placeholder="Jina la pili"  name="lname" value="{{$mkulima['farmer']->last_name}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Namba ya simu</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Namba ya simu"  name="phone" value="{{$mkulima['farmer']->phone_number}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Zao</label>
                          <div class="col-sm-10">
                           <select name="zao" class="custom-select form-control" id="exampleSelectBorder" required>
                                <option value="{{$mkulima->crop_id}}">{{$mkulima['crop']->crop_name}}</option>
                                @foreach($cropses as $crop)
                                <option value="{{$crop->id}}">{{$crop->crop_name}}</option>
                                @endforeach()
                            </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Kipimo</label>
                        <div class="col-sm-10">
                        <select name="kipimo" class="custom-select form-control" id="exampleSelectBorder" required>
                                <option value="{{$mkulima->crop_unit_id}}">{{$mkulima['cropunit']->unit_name}}</option>
                                @foreach($cropunit as $cropt)
                                <option value="{{$cropt->id}}">{{$cropt->unit_name}}</option>
                                @endforeach()
                            </select>
                      </div>
                    </div>
                          <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Kiasi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Kiasi" name="unitcount" value="{{$mkulima->unit_count}}" >
                        </div>
                      </div>

                        

                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Bei ya Jumla</label>
                        <div class="col-sm-10">
                          <input  class="form-control" id="inputExperience" placeholder="Bei ya Jumla" value="{{$mkulima->total_price}}" name="totalprice">
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
