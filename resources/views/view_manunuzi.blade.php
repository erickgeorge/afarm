@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manunuzi ya {{$buyer['buyers']->first_name}} {{$buyer['buyers']->last_name}}</h1>
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
                   <td><a title="Taarifa za Mkulima" href="{{route('view_manunuzi_mkulima',[$taarifa->id])}}"><i class="fas fa-eye"></i></a></td>
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