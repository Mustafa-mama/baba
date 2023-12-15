@extends('layouts.admin')
@section('title', 'create')
@section('create_sub')
 <div class="container">
    <div class="card-body lang">
        @include('admin.includes.alerts.errors')
        @include('admin.includes.alerts.success')
        <h1 class="form-section text-center"><i class="ft-home"></i>اضافة قسم فرعي</h1>
  <form class="form" action=""
   method="Post" enctype="multipart/form-data">
       @csrf
  

   
    
      
    @if(getActive()->count() > 0 )
      @foreach (getActive() as $index => $lang)
          
  
          <div class="row">
        <div class="col-md-6">
            <div class="form-group add">
                <label for="projectinput1">اسم القسم {{__('messages.'.$lang->abrr)}} </label>
                <input type="text" value="" 
                       class="form-control"
                       placeholder="ادخل اسم القسم "
                       name="cat[{{$index}}][name]" autocomplete="off">
                @error("cat.$index.name")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 d-none">
            <div class="form-group add">
                <label for="projectinput1">اختصار اللغة {{__('messages.'.$lang->abrr)}} </label>
                <input type="text"
                 value="{{$lang->abrr}}" 
                       class="form-control"
                       placeholder=""
                       name="cat[{{$index}}][abrr]" autocomplete="off">
                @error("cat.$index.abrr")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        


   





    <div class="row">

        <div class="col-md-6 add">
            <div class="form-group mt-1">
                <input type="checkbox"  value="1" name="cat[{{$index}}][active]"
                       id="switcheryColor4"
                       class="switchery" data-color="success"
                       checked/>
                <label for="switcheryColor4"
                       class="card-title ml-1">الحالة </label>

                @error("cat.$index.active")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
    </div>
  </div>
@endforeach
        
@endif


<div class="form-actions">
    <button type="button" class="btn btn-warning mr-1"
            onclick="history.back();">
        <i class="ft-x"></i> تراجع
    </button>
    <button type="submit" class="btn btn-success">
        <i class="la la-check-square-o"></i> حفظ
    </button>
</div>
</form>

 </div>
    
@endsection
    
