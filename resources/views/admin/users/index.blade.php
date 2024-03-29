

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
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card" style="padding:15px">
     
         @can('manage-users')
              <table class="table table-secondary table-responsive">
                    <thead>
                      <tr>
                      <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Reg_Number</th>
                        <th scope="col">Roles</th>
                         <th scope="col">School</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                    @foreach ($users  as $user )
                    <tr>
                         <th scope="row">{{$user->id}} </th>
                         <td>{{$user->name}}</td>
                         <td>{{$user->email}}</td>
                         <td>{{$user->reg_number}}</td>
                         
                         <td>{{ implode(',', $user->roles()->get()->pluck('name')->toArray())  }} </td>
                          <td>{{ implode(',', $user->schools()->get()->pluck('school_name')->toArray())  }} </td>
                         
                         <td>

                         @can('edit-users')
                            <a href="{{ route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-outline-primary float-left"><i class="fas fa-edit">edit</i></button>
                          @endcan
                          @can('delete-users')
                              <form action="{{ route('admin.users.destroy', $user)}}" method="POST" class="float-left">
                              @csrf
                              {{method_field('DELETE')}}
                              <button type="submit" class="btn btn-outline-warning"><i class="fas fa-trash">Delete</i></button>
                              </form>
                              @endcan
                         </td>
                        </tr> 
                     @endforeach     
                    </tbody>
                    </table>
                    {!!$users->render()!!}
                    @endcan
                    </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
