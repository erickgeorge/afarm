@extends('layouts.app')

@section('content')

<?php use App\Models\crops_farmerscropsunitprice; ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mkulima</h1>
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
                    <th>Jina la mkulima </th>
                    <th>Namba ya simu</th>
                    <th>Zao</th>
                    <th>Kipimo</th>
                    <th>Kiasi</th>
                    <th>Bei kwa Kipimo (Tzs)</th>
                    <th>Bei Ya Jumla (Tzs)</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                  @foreach($mkulima as $farmer)
                    <?php $i++; ?>

                  <tr>
                   <td>{{$i}}</td>
                    <td>{{$farmer['farmer']->first_name}} &nbsp; {{$farmer['farmer']->last_name}}</td>
                    <td>{{$farmer['farmer']->phone_number}}</td>
                    <td>{{$farmer['crop']->crop_name}}</td>
                    <td>{{$farmer['cropunit']->unit_name}}</td>
                    <td>{{number_format($farmer->unit_count)}}</td>
                    <?php $unit = crops_farmerscropsunitprice::where('farmers_crop_id',$farmer->id)->get(); ?>
                      
                    <td>@foreach($unit as $farmers)
                      {{number_format($farmers->unit_price)}} kwa {{$farmers['cropunit']->unit_name}}. &nbsp;
                       @endforeach</td>
                      
                    <td>{{number_format($farmer->total_price)}}</td>

                     <td><a title="Angalia Zaidi" href="{{url('view__mkulima',[$farmer->id])}}"><i class="fas fa-edit"></i></a></td>

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
