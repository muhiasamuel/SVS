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
              <li class="breadcrumb-item"><a href="{{ route('user.edit')}}">Update My Profile</a></li>
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
        <div class="card col-12" style="padding:15px">
        
                <div class="card-header">
                <h3>{{ __('Update users Profile') }}</h3>
                </div>

                <div class="card-body">
                     <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">userImage</label>
          <div class="col-md-4">                
        <img src="{{asset('images/'.$user->avatar)}}"style="width:150px;height:150px; float:left; border-radius:50%; margin-right:30px">
        <h3>{{$user->name}}'s Profile</h3>
        
      <form enctype="multipart/form-data" method="POST" action="{{ route('user.update') }}">
           @csrf
           <input type="file" name="avatar"value="{{ Auth::user()->avatar}}"  required>
           
         </div>
        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="text"placeholder="Username" class="form-control @error('name') is-invalid @enderror" name="name"value="{{ Auth::user()->name}}" required autocomplete="name" autofocus required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-4">
                                <input id="email" type="email" placeholder="E-Mail Address"class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="designation" class="col-md-2 col-form-label text-md-right">{{ __('Designation ') }}</label>

                            <div class="col-md-4">
                                <input id="designation" type="designation"placeholder="designation" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ Auth::user()->designation}}" required autocomplete="designation" required>

                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="reg_number" class="col-md-2 col-form-label text-md-right">{{ __('Reg Number ') }}</label>

                            <div class="col-md-4">
                                <input id="reg_number" type="reg_number"placeholder="Reg Number" class="form-control @error('reg_number') is-invalid @enderror" name="reg_number" value="{{ Auth::user()->reg_number}}" required autocomplete="reg_number" required>

                                @error('reg_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @can('can-be-elected')
                         <div class="form-group row">
                            <label for="candidate_agendas" class="col-md-2 col-form-label text-md-right">candidate agendas</label>

                            <div class="col-md-4">
                                <textarea id="candidate_agendas"  style="height:150px" placeholder="Tell other students what you will do for them when you are elected" type="candidate_agendas" class="form-control @error('Details') is-invalid @enderror" name="candidate_agendas" value="{{ Auth::user()->candidate_agendas}}"></textarea>

                                @error('candidate_agendas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <label for="About_user" class="col-md-2 col-form-label text-md-right">About user</label>

                            <div class="col-md-4">
                                <textarea id="About_user"  style="height:150px" placeholder="Tell other students about yourself" type="About_user" class="form-control @error('About_user') is-invalid @enderror" name="About_user" value="{{ Auth::user()->About_user}}"></textarea>

                                @error('About_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endcan
                          <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-4">
                                <input id="password" type="password"placeholder="Enter New Password" class="form-control @error('password') is-invalid @enderror" name="password"value="{{ Auth::user()->password}}" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Update Details') }}
                                </button>
                            </div>
                        </div>
                    </form>
                 </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
