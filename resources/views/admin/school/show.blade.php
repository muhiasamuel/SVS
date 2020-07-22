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
        <div class="col-lg-6 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.school.index') }}"> Back</a>
            </div>
        </div>
    </div>  <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Details:</strong>
               {{$school->Details}}
            </div>
             </div>
        </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="card col-12">
             
                @foreach ($schools as $school)
                <strong> below users belong to:
                  <h4>{{ $school->school_name}}</h4></strong>
                  <div class="card">
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
                            <a href="{{ route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-outline-success float-left"><i class="fas fa-edit"></i></button>
                          @endcan
                          @can('delete-users')
                              <form action="{{ route('admin.users.destroy', $user)}}" method="POST" class="float-left">
                              @csrf
                              {{method_field('DELETE')}}
                              <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-trash"></i></button>
                              </form>
                              @endcan
                         </td>
                        </tr> 
                  @endforeach
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