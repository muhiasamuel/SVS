

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
              <li class="breadcrumb-item"><a href="{{ route('admin.users.index')}}">Edit Users</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Faculties</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.school.create') }}"> Create New Faculty</a>
            </div>
        </div>
    </div>
     
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card" style="padding:15px">
        
              <table class="table table-responsive">
                    <thead>
                      <tr>
                    {{ Auth::user()->name}}
                    {{ Auth::user()->email}}
                    {{ Auth::user()->password}}
                    {{ Auth::user()->name}}
                      <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Details</th>
                        <th scope="col">Faculty Id</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                    @foreach ($schools as $School)
                    <tr>
                         <th scope="row">{{$i++}} </th>
                         <td>{{$School->school_name}}</td>
                         <td>{{$School->Details}}</td>
                         <td>{{$School->facultyId}}</td>
                         
                         <td>

                         @can('edit-users')
                            <a href="{{ route('admin.school.edit', $School->id)}}"><button type="button" class="btn btn-primary float-left">Edit</button>
                            
                    <a class="btn btn-info" href="{{ route('admin.school.show',$School->id) }}">Show</a>
                          @endcan
                          @can('delete-users')
                              <form action="{{ route('admin.school.destroy', $School)}}" method="POST" class="float-left">
                              @csrf
                              {{method_field('DELETE')}}
                              <button type="submit" class="btn btn-warning">Delete</button>
                              </form>
                              @endcan
                         </td>
                        </tr> 
                     @endforeach     
                    </tbody>
                    </table>
                    </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
