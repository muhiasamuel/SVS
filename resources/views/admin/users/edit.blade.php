
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
              <li class="breadcrumb-item"><a href="{{ route('admin.users.edit', $user->id)}}">Edit{{$user->name}} </a></li>
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
              <form action="{{route('admin.users.update', $user)}} " method="POST"> 
                   <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                   <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email}}" required  autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="reg_number" class="col-md-2 col-form-label text-md-right">Reg Number</label>

                            <div class="col-md-6">
                                <input id="reg_number" type="reg_number" class="form-control @error('reg_number') is-invalid @enderror" name="reg_number" value="{{ $user->reg_number}}" required >

                                @error('reg_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        @csrf
                         {{ method_field('PUT')}}
                         <div class="form-group row">
                            <label for="roles" class="col-md-2 col-form-label text-md-right">Role</label>
                            <div class="col-md-6">
                         @foreach($roles as $role )
                         
                         <div class="form-check">
                          <input type="checkbox"name="roles[]" value="{{$role->id}} "
                          @if ($user->roles->pluck('id')->contains($role->id))
                          checked
                          @endif>
                          <label>{{$role->name}}</label>
                         </div>
                             
                         @endforeach
                          </div> 
                         
                           </div>
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

