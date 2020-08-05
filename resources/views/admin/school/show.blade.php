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
    <div class="card" style="padding:15px">
         <div class="row">
        <div class="col-lg-10 margin-tb">
            <div class="pull-left">
                <h2> Students according to their schools</h2>
            </div>
            <div class="float-right ">
            <form class="form-inline my-2 my-lg-2" type="get" action="{{url('/search')}}" >
            <input class="form-control mr-sm-2"name="query"type="search" placeholder="Search" aria-label="search">
            <button class="btn btn-outline-success my-2 my-sm-0"type="submit">Search</button>
            </form>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.school.index') }}"> Back</a>
            </div>
        </div>
    </div>  
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="card col-12">
                <strong>Click on the page links to view the next school</strong>
             
                @foreach ($schools as $school)
                <strong> below users belong to:
                  <h4>{{ $school->school_name}}</h4></strong>
                  <div class="card col-10 ">
                  <p>
                  <table class="table table-responsive">
                   <thead>
                      <tr>
                  <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Reg_Number</th>
                        <th scope="col">Roles</th>
                        
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                  @foreach ($school->users as $user)
                      <th scope="row">{{$user->id}} </th>
                         <td>{{$user->name}}</td>
                         <td>{{$user->email}}</td>
                         <td>{{$user->reg_number}}</td>
                         
                         <td>{{ implode(',', $user->roles()->get()->pluck('name')->toArray())  }} </td>
                          
                         
                         <td>

                         @can('edit-users')
                            <a href="{{ route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-outline-primary float-left"><i class="fas fa-edit"></i></button>
                          @endcan
                          @can('delete-users')
                              <form action="{{ route('admin.users.destroy', $user)}}" method="POST" class="float-left">
                              @csrf
                              {{method_field('DELETE')}}
                              <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                              </form>
                              @endcan
                         </td>
                        </tr> 
                      
                  @endforeach
 {!!$schools->render()!!}
                  </tbody>
                  </p>
                  </table> 
                 

                  </div> 
                  
                @endforeach
               
                </div>
            </div>
        </div>
         </div>
         
    </div>
</div>
    </div>
</section>
@endsection