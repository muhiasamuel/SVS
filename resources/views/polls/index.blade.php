 @extends('layouts.admin')

 @section('content')
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
              <li class="breadcrumb-item"><a href="{{ route('poll.index')}}">New Election</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="content">
       <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="col-md-4">
                <h2>Elections</h2>
            </div>
            <div class="float-right col-md-3 offset-md-1">
                <a class="btn btn-success" href="{{ route('poll.create') }}"> Create New Election</a>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
     
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card col-md-10 offset-md-1" style="padding:15px">

       

 <table class="table table-responsive">
                    <thead>
                      <tr>
                   
                      <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                    @foreach ($polls as $poll )
                    <tr>
                         <th scope="row">{{$poll->id}} </th>
                         <td>{{$poll->name}}</td>
                         <td>{{$poll->start_date}}</td>
                         <td>{{$poll->end_date}}</td>
                         
                         <td>

                         @can('edit-users')
                            <a href="{{ route('admin.school.edit', $poll->id)}}"><button type="button" class="btn btn-outline-primary float-left"><i class="fas fa-edit"></i></button></a>
                             @endcan
                    <a class="btn btn-outline-info" href="{{ route('poll.show',$poll->id) }}"><i class="fas fa-eye"></i></a>
                         
                          @can('delete-users')
                              <form action="{{ route('poll.destroy', $poll)}}" method="POST" class="float-left">
                              @csrf
                              {{method_field('DELETE')}}
                              <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
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
@endsection    