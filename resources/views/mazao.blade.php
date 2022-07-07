@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> {{$mazaoid->crop_name}} </h1>
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
                    <th>Mkoa </th>
                    <th>Wilaya</th>
                    <th>Mkulima</th>
                    <th>Kiasi</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                  @foreach($mazao as $farmer)
                    <?php $i++; ?>

                  <tr>
                   <td>{{$i}}</td>
                   <td>{{$farmer['farmer']['location']['location_district']['location_region']->region_name}}</td>
                   <td>{{$farmer['farmer']['location']['location_district']->district_name}}</td>
                   <td>{{$farmer['farmer']->first_name}} &nbsp; {{$farmer['farmer']->last_name}}</td>
                   <td>{{number_format($farmer->unit_count)}}</td>   
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
