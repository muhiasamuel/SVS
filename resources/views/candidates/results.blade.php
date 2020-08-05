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

                     <table class="table table-responsive">
                      <thead>
                      <tr>
                   
                     
                        <th scope="col">Name</th>
                        <th scope="col">Total Votes</th>
                        <th scope="col">designation</th>
                      </tr>
                    </thead>
                             <tbody>
                 
                      @foreach ($Users as $User)
                    <tr>
                         @if (count($User->polls) > 0)
                             <td>{{$User->name}}</td>
                         <td>{{$User->polls_count}} votes </td>
                         
                         <td>{{$User->designation}},@if (($User->roles('name'))== 'delegate')   {{  $User->schools()->get()->pluck('school_name')  }}@endif </td>
                         
                         </tr> 
                         @endif
                        
                          @endforeach   
                  
                   
                         </tbody>
                     </table>
                     
                     
                       
                   

    </div>
    </div>
</section>
</div>
@endsection