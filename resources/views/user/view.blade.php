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
           <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right"></label>
          <div class="col-md-4">
          <h3>{{$user->name}}'s Profile</h3>                
        <img src="{{asset('images/'.$user->avatar)}}"style="width:180px;height:170px; float:left; border-radius:50%; margin-right:30px">
        
        </div>
</div>
 <div class=" row">
 
                 <strong class="col-md-3 text-md-right">Username:</strong>
          <div class="col-md-2">
          
        <p>{{ Auth::user()->name}}</p>

         </div>
                 <strong>Email:</strong>
          <div class="col-md-3">
          
        <p>{{ Auth::user()->email}}</p>

         </div>
          <strong>Reg Number:</strong>
          <div class="col-md-2">
          
        <p>{{ Auth::user()->reg_number}}</p>

         </div>
</div> 
 
  @can('can-be-elected')
   <div class="row">
       <label for="About_user" class="col-md-3 col-form-label text-md-right">About User: </label>
          <div class="col-md-3">
          
    <p>{{ Auth::user()->About_user}}</p>
    </div>
     <label for="name" class="col-md-2 col-form-label text-md-right">Candidate Agendas: </label>
         <div class="col-md-3">
        
    <p>{{ Auth::user()->candidate_agendas}}</p>
    </div>
  </div>
  @endcan
</div>
</div>
    </div>
</section>
@endsection