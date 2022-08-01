@extends('layouts.app')

@section('content')
<?php use Carbon\Carbon; 
$now = Carbon::now();?>

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
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>View</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                 @foreach($taarifa as $taarifa)
                    <?php $i++; ?>

                  <tr>
                   <td>{{$i}}</td>
                   <td>{{$taarifa['buyers']->first_name}} {{$taarifa['buyers']->last_name}}</td>
                   <td>{{ date('d F Y', strtotime($taarifa->subscription_start_date)) }}</td>
                   <td>{{ date('d F Y', strtotime($taarifa->subscription_end_date)) }}</td>
                   <td>{{number_format($taarifa['pachages']->price)}}</td>
                   <td>@if($now > $taarifa->subscription_end_date) Expired @else Active @endif</td>
                   <td><a title="Angalia Zaidi" href="{{route('view_manunuzi',[$taarifa->id])}}"><i class="fas fa-eye"></i></a></td>
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
