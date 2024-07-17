@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subjects List</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
            <a href = "{{ url('admin/subject/add') }}"  class="btn btn-primary">Add new Subject</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


        <div class="container-fluid">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card ">
                  <div class="card-header">
                    <h3 class="card-title">Search subject </h3>
                    <!-- /.card-header -->
                    <!-- form start -->
                  </div>
                    <form method ="GET" action="">

                    <div class="card-body">
                      <div class="row">
                        <div class="form-group col-md-3">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ Request::get('name') }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Subject Type</label>
                            <select name="type" id="" class="form-control" >
                                <option value="">Select Type</option>
                                <option {{ (Request::get('type') == 'Theory') ? 'selected' :'' }} value="Theory">Theory</option>
                                <option {{ (Request::get('type') == 'Practical') ? 'selected' :'' }} value="Practical">Practical</option>
                            </select>
                          </div>
                        <div class="form-group col-md-3">
                            <label>Date</label>
                            <input type="date" class="form-control" name ="date" placeholder="Date" value="{{ Request::get('date') }}">
                        </div>
                      <div class="form-group col-md-3">
                        <button class ="btn btn-primary" type="submit" style="margin-top:30px;">Search</button>
                        <a class ="btn btn-success" href="{{ url('admin/subject/list') }}" style="margin-top:30px;">Reset</a>
                      </div>
                    </div>


                    </div>
                    <!-- /.card-body -->


                    </form>
                  </div>
                </div>
            </div>
          <!-- /.card -->



</section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- /.col -->
          <div class="col-md-12">
            @include('message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Subject List </h3>


              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->type }}</td>

                        <td>{{ $value->created_by_name }}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td>
                            <a href="{{ url('admin/subject/edit',$value->id) }}" class ="btn btn-primary">Edit</a>
                            <a href="{{ url('admin/subject/delete',$value->id) }}" class ="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style="padding:10px; float:right">

                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
