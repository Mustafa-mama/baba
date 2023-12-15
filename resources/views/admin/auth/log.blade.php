@extends('layouts.login')
@section('title','Login')
@section('content')
   <div class="container">
     <div class="login-img">
        <div class="login-color">
         
         <h1 class="text-center">Log in</h1>
          <div class="img-user text-center">
             <img class="img-responsive" src="{{asset('assets/admin/img/pic1.png')}}" alt="admin">
      
          </div>
          
            
            <form class="form-horizontal" action="{{route('admin.login')}}" method="POST">
                
                {{-- <img class="r" src="img/br.png" alt="user"> --}}
                  @include('admin.includes.alerts.errors ')
                  @include('admin.includes.alerts.success ')
                @csrf
              

                <input class="form-control" type="text" name="user"
                 placeholder="Input The Usernmae" autocomplete="off">
                 @error('user')
                  <span class="text-danger"></span>
                     
                 @enderror
                 <input class="form-control" type="password" name="password"
                 placeholder="Input The Password" autocomplete="new-password">
                 @error('password')
                  <span class="text-danger"></span>
                     
                 @enderror
                 <input class="form-control sub-login" type="submit" value="دخول" >  
            </form>
           
        </div>
     </div>
   </div>

   
@stop