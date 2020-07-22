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
              <li class="breadcrumb-item"><a href="{{ route('admin.users.index')}}">ADD schools</a></li>
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
        <div class="card col-8" style="padding:15px; background:#3490dc; color:white ">
    
        <div class="pull-left">
            <h2>Add New Faculty</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.school.index') }}"> Back</a>
        </div>
 
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('admin.school.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>school Name:</strong>
                <input type="text" name="school_name" class="form-control" placeholder="School Name">
            </div>
            </div>
        </div>
        <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Faculty Id:</strong>
                <input type="text" name="facultyId" class="form-control" placeholder="Faculty">
            </div>
            </div>
        </div>
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>school Details:</strong>
                <textarea class="form-control" style="height:150px" name="Details" placeholder="Detail"></textarea>
            </div>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
 </div>
</div>
</section>
@endsection