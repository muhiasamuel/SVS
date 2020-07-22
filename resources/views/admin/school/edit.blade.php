
 @extends('layouts.admin')

 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.school.edit', $school->id)}}">Edit {{$school->school_name}} </a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card col-md-10" style ="padding:20px">
              <form action="{{route('admin.school.update', $school)}} " method="POST"> 
                   <div class="form-group row">
                            <label for="school_name" class="col-md-2 col-form-label text-md-right">School Name</label>

                            <div class="col-md-6">
                                <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name" value="{{$school->school_name }}" required autocomplete="school_name" autofocus>

                                @error('school_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                   <div class="form-group row">
                            <label for="facultyId" class="col-md-2 col-form-label text-md-right">facultyId</label>
                            <div class="col-md-6">
                                <input id="facultyId" type="facultyId" class="form-control @error('facultyId') is-invalid @enderror" name="facultyId" value="{{ $school->facultyId}}" required  autofocus>

                                @error('facultyId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="Details" class="col-md-2 col-form-label text-md-right">Details</label>

                            <div class="col-md-6">
                                <input id="Details" type="Details" class="form-control @error('Details') is-invalid @enderror" name="Details" value="{{ $school->Details}}" required >

                                @error('Details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         @csrf
                         {{ method_field('PUT')}}
                         
                       
                         <button type="submit"class="btn btn-outline-primary">Update</button>
                        </form>
                    </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

