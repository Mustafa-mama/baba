@extends('layouts.admin')
@section('title', 'Edit')
@section('editlang')
 <div class="container">
    <div class="card-body lang">
        @include('admin.includes.alerts.errors')
        @include('admin.includes.alerts.success')
  <form class="form" action="{{route('updatelang.admin',$edit->id)}}" method="post">
       @csrf

   
    <h1 class="form-section text-center"><i class="ft-home"></i> تحديث بيانات اللغة</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group add">
                <label for="projectinput1"> اسم اللغة </label>
                <input type="text" value="{{$edit->name}}" id="name"
                       class="form-control"
                       placeholder="ادخل اسم اللغة  "
                       name="name" autocomplete="off">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
    
        <div class="col-md-6">
            <div class="form-group add">
                <label for="projectinput1"> أختصار اللغة </label>
                <input type="text" value="{{$edit->abrr}}" id="name"
                       class="form-control"
                       placeholder="ادخل أختصار اللغة  "
                       name="abrr" autocomplete="off">
                @error('abbr')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group add">
                <label for="projectinput1"> الاسم المحلي</label>
                <input type="text" value="{{$edit->local}}" id="na"
                       class="form-control"
                       placeholder="ادخل الاسم المحلي"
                       name="local" autocomplete="off">
                @error('local')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
   



    

        <div class="col-md-6">
            <div class="form-group add">
                <label for="projectinput2"> الاتجاة </label>
                <select name="direction" class="select2 form-control">
                    <optgroup label="من فضلك أختر اتجاه اللغة ">
                        <option value="rtl"@if($edit->direction == 'rtl')selected @endif>من اليمين الي اليسار</option>
                        <option value="ltr"@if($edit->direction == 'ltr')selected @endif>من اليسار الي اليمين</option>
                    </optgroup>
                </select>
                @error('direction')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 add">
            <div class="form-group mt-1">
                <input type="checkbox"  value="" name="active"
                       id="switcheryColor4"
                       class="switchery" data-color="success"
                     @if ($edit->active == 1) checked  @endif                
                     />
                <label for="switcheryColor4"
                       class="card-title ml-1">الحالة </label>

                @error('active')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
    </div>
</div>


<div class="form-actions">
    <button type="button" class="btn btn-warning mr-1"
            onclick="history.back();">
        <i class="ft-x"></i> تراجع
    </button>
    <button type="submit" class="btn btn-success">
        <i class="la la-check-square-o"></i> تحديث
    </button>
</div>
</form>

 </div>
    
@endsection
    
