@extends('layout.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Edit Subject</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">

              <!-- /.card-header -->
              <!-- form start -->
              <form method ="POST" action="">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Subject Name</label>
                    <input type="text" class="form-control" name="name" required placeholder="Class Name" value={{ $getRecord->name }}>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="" class="form-control">
                        <option {{ ($getRecord->status ==0) ? 'selected':'' }} value="0">Active</option>
                        <option {{ ($getRecord->status ==1) ? 'selected':'' }} value="1">Inactive</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Subject Type</label>
                    <select name="type" id="" class="form-control" required>

                        <option {{ ($getRecord->type == "Theory") ? 'selected':''}} value="Theory">Theory</option>
                        <option {{ ($getRecord->type == "Practical") ? 'selected':''}} value="Practical">Practical</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          </div>
        </div>
       </div>

    </section>

@endsection
