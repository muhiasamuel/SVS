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
           
            <div class="float-right ">
            <form class="form-inline my-2 my-lg-2" type="get" action="{{url('/search')}}" >
            <input class="form-control mr-sm-2"name="query"type="search" placeholder="Search" aria-label="search">
            <button class="btn btn-outline-success my-2 my-sm-0"type="submit">Search</button>
            </form>
            </div>
            <div class="pull-right">
                <h2> Candidates</h2>
            </div>
        </div>
    </div> 
      @foreach ($roles as $role) 
   <div class="form-group row mb-0">
    <h4 class="col-8 offset-md-2"><strong> Click on the page links below to view the next candidate</strong></h4>
                            <div class="col-md-6 offset-md-4">
                            
                             {!!($role->users()->paginate(1,['*'],'usersPage') ->links())!!}  
                            </div>
                        </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 ">
            
                <div class="card col-12 "style="background: rgb(10, 7, 32); color:white; padding:30px 0;">
                  <h4 class="col-6 offset-md-4">{{ $role->name}}s</h4></strong>
                    <div class="col-12 offset-md-1">
                  <div class="card col-10" style=" background:linear-gradient(to bottom,rgb(10, 7, 33) 9%, rgb(10, 7, 38) 19%, 
     rgb(1, 9, 45) 39%,  #61519e 79%, rgb(207, 195, 200) 100%) #1c1c1c;padding:10px;font-style:italic; font-size:18px; border:none;border-radius:3%;color:black;">
                
            
                  @foreach ($role->users()->paginate(1,['*'],'usersPage') as $candidate)
       
                           
      <div class="row" >
     <strong class="col-md-1 text-md-right"></strong>
           <img src="{{asset('images/'.$candidate->avatar)}}"style="width:177px;height:190px; float:left; border-radius:50%; margin-top:20px">
           <div class="col-md-4" style="padding-top:98px;color:white;" >
           <strong class="col-md-4 text-lg-right" >My Names:</strong>
            <p style="">{{$candidate->name}}</p>
            </div>
    </div>
   <br>
    <div class="row" style="border:0.5px solid rgba(0, 0, 0, 0.1);padding:0 10px;color:rgb(175, 174, 179);">
     <strong class="col-md-2 text-md-right">School:</strong>
           <p>{{ implode(',', $candidate->schools()->get()->pluck('school_name')->toArray())  }}</p>
              <strong class="col-md-2 text-md-right">Vying For:</strong>
           <p>{{  $candidate->designation }}</p>
    </div>
     <div class="row" style="color:rgb(175, 174, 179);border:1px solid rgba(0, 0, 0, 0.1);padding:0 10px;" >
    <div class="col-md-12">
     <strong class="col-md-2 text-md-right">About Me:</strong>
           <p style="">{{  $candidate->About_user }}</p>
    </div>
    </div>
    <div class="row" style="border:1px solid rgba(0, 0, 0, 0.1);padding:0 10px;color: hsl(276, 3%, 99%)">
       <div class="col-md-12">
  <strong class="col-md-2 text-md-right">My Agendas</strong>
           <p>{{  $candidate->candidate_agendas }}</p>
    </div>
    
    </div>
         <br>
         <br> 
    <div class="row">
     <strong class="col-md-4 text-md-right">Actions:</strong>
      @can('edit-users')  <p>
                            <a href="{{ route('admin.users.edit', $candidate->id)}}"><button type="button" class="btn btn-primary float-left"><i class="fas fa-edit">Edit</i></button>
                         </a></p> @endcan
                           @can('delete-users')
                             <p> <form action="{{ route('admin.users.destroy', $candidate)}}" method="POST" class="float-left">
                              @csrf
                              {{method_field('DELETE')}}
                              <button type="submit" class="btn btn-danger"><i class="fas fa-trash">Delete</i></button>
                              </form></p>
                              @endcan
                              @can('can-vote') 
                              <a href="{{ route('candidate.poll', $candidate->id)}}"><button type="button" class="btn btn-success float-left"><i class="fas fa-edit">Vote For Me</i></button>
                         </a></p>
                         @endcan
                          <p>
                            <a href="#"><button type="button" class="btn btn-info float-left"><strong> my Votes: {{$candidate->polls->count()}}</strong></button>
                         </a></p>

                           
                              </div>   
                  @endforeach
                    
                    
                 
                   </div>
                    
                    </div>
                 </div>
            </div>
              
               
                </div>
           
             @endforeach
        
         
      </div>
    </div>
</section>
</div>
@endsection