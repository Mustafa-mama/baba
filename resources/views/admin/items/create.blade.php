@extends('layouts.admin')
@section('title', 'add-item')
@section('cearte')
 <div class="container">
    <div class="card-body lang">
        @include('admin.includes.alerts.errors')
        @include('admin.includes.alerts.success')
        <h1 class="form-section text-center"><i class="ft-home"></i> اضافة منتج</h1>
  <form class="form" action="{{route('store.item.admin')}}"
   method="Post" enctype="multipart/form-data">
       @csrf

       <div class="row">
        <div class="col-md-6 add">
            <div class="form-group">
                <label for="projectinput1">صورة المنتج</label>
                <input type="file" value="" 
                       class="form-control"
                       
                       name="imge" autocomplete="off">
                @error("imge")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
       </div>
  

   
     
       @if(getActive()->count() > 0 )
       @foreach (getActive() as $index => $lang)
          
  
          <div class="row">
        <div class="col-md-6 add">
            <div class="form-group">
                <label for="projectinput1">اسم المنتج {{__('messages.'.$lang->abrr)}}</label>
                <input type="text" value="" 
                       class="form-control"
                       placeholder="ادخل اسم المنتج"
                       name="item[{{$index}}][name]" autocomplete="off">
                @error("item.$index.name")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 add">
            <div class="form-group">
                <label for="projectinput2"> أختار المتجر {{__('messages.'.$lang->abrr)}}</label>
                <select name="item[{{$index}}][vendor_id]" class="select2 form-control">
                    <optgroup label="من فضلك أختار المتجر">
                        @if($vendor && $vendor->count() > 0)
                            @foreach($vendor as $vendors)
                                <option
                                    value="{{$vendors ->id }}">{{$vendors->name}}</option>
                            @endforeach
                        @endif
                    </optgroup>
                </select>
                @error("item.$index.vendor_id")
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
          </div>
          </div>
      

        <div class="row">
            <div class="col-md-6 add">
                <div class="form-group">
                    <label for="projectinput1">الدولة {{__('messages.'.$lang->abrr)}}</label>
                    <input type="text"                
                           class="form-control"
                           placeholder=""
                           name="item[{{$index}}][contry]" autocomplete="off">
                    @error("item.$index.contry")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 add">
                <div class="form-group">
                    <label for="projectinput1">الوصف {{__('messages.'.$lang->abrr)}}</label>
                    <input type="text" value="" 
                           class="form-control"
                           placeholder=""
                           name="item[{{$index}}][descrip]" autocomplete="off">
                    @error("item.$index.descrip")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div> 
        </div> 
        
        <div class="row">
            <div class="col-md-6 add">
                <div class="form-group">
                    <label for="projectinput1">السعر {{__('messages.'.$lang->abrr)}}</label>
                    <input type="text"                
                           class="form-control"
                           placeholder=""
                           name="item[{{$index}}][price]" autocomplete="off">
                    @error("item.$index.price")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 add">
                <div class="form-group">
                    <label for="projectinput2"> أختار الحالة {{__('messages.'.$lang->abrr)}}</label>
                    <select name="item[{{$index}}][status]" class="select2 form-control">
                        <optgroup label="من فضلك أختار الحالة">                          
                               
                                    <option value="0">---</option>
                                    <option value="1">New</option>
                                    <option value="2">Like New</option>
                                    <option value="3">Used</option>
                            
                         
                        </optgroup>
                    </select>
                    @error("item.$index.status")
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
              </div>
              </div>

              <div class="row">
                <div class="col-md-6 d-none">
                    <div class="form-group add">
                        <label for="projectinput1">اختصار اللغة {{__('messages.'.$lang->abrr)}} </label>
                        <input type="text"
                         value="{{$lang->abrr}}" 
                               class="form-control"
                               placeholder=""
                               name="item[{{$index}}][abrr]" autocomplete="off">
                        @error("item.$index.abrr")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

              </div>
              @endforeach
              @endif


     
        
      {{-- <div class="row">

        <div class="col-md-6 add">
            <div class="form-group mt-1">
                <input type="checkbox"  value="1" name="active"
                       id="switcheryColor4"
                       class="switchery" data-color="success"
                       checked/>
                <label for="switcheryColor4"
                       class="card-title ml-1">الحالة </label>

                @error("active")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
     </div> --}}
    

  



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




    