@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Taarifa za {{$buyer['buyers']->first_name}} {{$buyer['buyers']->last_name}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Taarifa</li>
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
                    <!-- <th>Bei Kwa Kipimo</th> -->
                    <th>Mikoa zaidi</th>
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
                   <!-- <td>Bei</td> -->
                   <td>    
                         <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                               <i style="color:green;" class="fas fa-eye" title="Mikoa Zaidi"></i>
                        </button>

                      <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Mikoa Zaidi</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                             
                                      <div class="card">
                                        <div class="card-header">
                                          <!-- <h3 class="card-title">DataTable with default features</h3> -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                          <table id="example3" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                              <th>No.</th>
                                              <th>Mazao</th>
                                              <th>Mkoa</th>
                                              <th>Kipimo</th>
                                              <th>Bei Kwa Kipimo</th>
                                              
                                            </tr>
                                            </thead>
                                            <tbody>
                                              <?php $k=0; ?>
                                            @foreach($taarifa as $taarifas)
                                              <?php $k++; ?>

                                            <tr>
                                             <td>{{$k}}</td>
                                             <td>Mahindi</td>
                                             <td>Katavi</td>
                                             <td>Tani 0.0</td>
                                             <td>Bei</td>
                                            </tr>

                                            @endforeach

                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                          </table>
                                        </div>
                                        <!-- /.card-body -->
                                      </div>


                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->

                  </td>
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
