@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$mtu['farmer']->first_name}} &nbsp; {{$mtu['farmer']->last_name}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Mkulima</li>
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
                        <!-- /.col -->
          <div >
            <div class="card">
       
              <div class="card-body">
                <table  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Aina ya zao</th>
                    <th>{{$mtu['crop']['cropcategory']->category_name}}</th> 
                  </tr>

                  <tr>
                    <th>Jina la zao</th>
                    <th>{{$mtu['crop']->crop_name}}</th> 
                  </tr>

                  <tr>
                    <th>Kiasi cha zao</th>
                    <th>{{$mtu['cropunit']->unit_name}} {{number_format($mtu->unit_count)}}</th> 
                  </tr>


                   <tr>
                    <th>Bei ya jumla(TZS)</th>
                    <th>{{number_format($mtu->total_price)}}</th> 
                  </tr>


                      <tr>
                    <th>Bei kwa kipimo(TZS)</th>
                      @foreach($unit as $farmers)
                    <th>{{number_format($farmers->unit_price)}} kwa {{$farmers['cropunit']->unit_name}}</th> 
                      @endforeach
                  </tr>


                  </thead>
            
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->



    


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Mawasiliano ya mkulima</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Simu</th>
                    <th>{{$farmer->phone_number}}</th> 
                  </tr>

                  <tr>
                    <th>Mkoa</th>
                    <th>{{$farmer['location']['location_district']['location_region']->region_name}}</th> 
                  </tr>

                  <tr>
                    <th>Wilaya</th>
                    <th>{{$farmer['location']['location_district']->district_name}}</th> 
                  </tr>


                   <tr>
                    <th>Mtaa/Kijiji</th>
                    <th>{{$farmer['location']->village_name}}</th> 
                  </tr>


                  </thead>
            
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
