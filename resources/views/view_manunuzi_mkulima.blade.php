@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Taarifa Zaidi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Taarifa Zaidi</li>
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
          <div >
            <div class="card">
       
              <div class="card-body">
                <div class="tab-content">



                  <div class="active tab-pane" class="tab-pane" id="settings">

                      <div class="form-group row">
                      
                          <input type="text" class="form-control" id="inputName" value="{{$taarifafirst['weight']['crop']['cropcategory']->category_name}}"  name="name" disabled>
                      
                      </div>

                   
                      <div class="form-group row">
                      
                          <input type="text" class="form-control" id="inputName" value="{{$taarifafirst['weight']['crop']->crop_name}}"  name="name" disabled>
                      
                      </div>
                     
                      <div class="form-group row">
                      
                          <input type="text" class="form-control" id="inputName" value="{{$taarifafirst['weight']['location_region']->region_name}}"  name="name" disabled>
                      
                      </div>
<!-- 
                       <div class="form-group row">
                          @foreach($taarifacrop as $taarifas)
                          <input type="text" class="form-control" id="inputName" value="{{$taarifas['cropunit']->unit_name}}: {{$taarifas->unit_count}}"  name="name" disabled>
                          @endforeach
                      
                      </div> -->
                  
                 
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
                <h3 class="card-title">Wakulima</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Jina la mkumila</th>
                     <th>Kipimo</th>
                     <th>Kiasi</th>
                    <th>Nunua</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                  @foreach($taarifacrop as $farmer)
                    <?php $i++; ?>

                  <tr>
                   <td>{{$i}}</td>
                 <td>{{$farmer['farmer']->first_name}} &nbsp; {{$farmer['farmer']->last_name}}</td>
                 <td>{{$farmer['cropunit']->unit_name}}</td>
                    <td>{{number_format($farmer->unit_count)}}</td>   
                   <td><a title="Nunua" href="{{route('view_manunuzi_next',[$farmer->id])}}"><i class="fas fa-eye"></i></a></td>
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
