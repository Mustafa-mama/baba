@extends('layouts.admin')
@section('title', 'edit-item')
@section('edit')
 <div class="container">
    <div class="card-body lang">
        @include('admin.includes.alerts.errors')
        @include('admin.includes.alerts.success')
        <h1 class="form-section text-center"><i class="ft-home"></i> تحديث منتج</h1>
  <form class="form" action="{{route('update.item.admin',$edit->id)}}"
   method="Post" enctype="multipart/form-data">
       @csrf
       <input name="id" value="{{$edit->id}}" type="hidden">

       <div class="form-group">
        <div class="text-center">
           <img
          src="{{$edit ->imge }}"
           alt="صورة القسم  ">
       </div>
     </div>

       <div class="row">
        <div class="col-md-6 add">
            <div class="form-group">
                <label for="projectinput1">صورة المنتج</label>
                <input type="file" id="file"  
                       class="form-control"
                       
                       name="imge" autocomplete="off">
                @error("imge")
                <span class="text-danger">{{$message}}</span>
                 @enderror
            </div>
        </div>
       </div>
     
             <div class="row">
        <div class="col-md-6 add">
            <div class="form-group">
                <label for="projectinput1">اسم المنتج {{__('messages.'.$edit->translation_lang)}}</label>
                <input type="text" value="{{$edit->name}}" 
                       class="form-control"
                       placeholder="ادخل اسم المنتج"
                       name="item[0][name]" autocomplete="off">
                @error("item.0.name")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 add">
            <div class="form-group">
                <label for="projectinput2"> أختار المتجر {{__('messages.'.$edit->translation_lang)}}</label>
                <select name="item[0][vendor_id]" class="select2 form-control">
                    <optgroup label="من فضلك أختار المتجر">
                        @if($vendor && $vendor->count() > 0)
                            @foreach($vendor as $vendors)
                            <option 
                            value="{{$vendors->id }}" @if ($edit->vendor_id == $vendors->id)
                                    selected
                                        
                                    @endif>{{$vendors->name}}
                            </option>
                                    
                            @endforeach
                        @endif
                    </optgroup>
                </select>
                @error("item.0.vendor_id")
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
          </div>
          </div>
      

        <div class="row">
            <div class="col-md-6 add">
                <div class="form-group">
                    <label for="projectinput1">الدولة {{__('messages.'.$edit->translation_lang)}}</label>
                    <input type="text"                
                           class="form-control"
                           placeholder=""
                           value="{{$edit->contry}}" 
                           name="item[0][contry]" autocomplete="off">
                    @error("item.0.contry")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 add">
                <div class="form-group">
                    <label for="projectinput1">الوصف {{__('messages.'.$edit->translation_lang)}}</label>
                    <input type="text" value="{{$edit->descrip}}"  
                           class="form-control"
                           placeholder=""
                           name="item[0][descrip]" autocomplete="off">
                    @error("item.0.descrip")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div> 
        </div> 
        
        <div class="row">
            <div class="col-md-6 add">
                <div class="form-group">
                    <label for="projectinput1">السعر {{__('messages.'.$edit->translation_lang)}}</label>
                    <input type="text"  value="{{$edit->price}}"               
                           class="form-control"
                           placeholder=""
                           name="item[0][price]" autocomplete="off">
                    @error("item.0.price")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 add">
                <div class="form-group">
                    <label for="projectinput2"> أختار الحالة {{__('messages.'.$edit->translation_lang)}}</label>
                    <select name="item[0][status]" class="select2 form-control">
                        <optgroup label="من فضلك أختار الحالة"> 
                                                    
                                <option value="item.0">---</option>
                                <option value="1"@if ($edit->status ==1 )selected  @endif>New</option> 
                                <option value="2"@if ($edit->status ==2 )selected  @endif>Like new</option> 
                                <option value="3"@if ($edit->status ==3 )selected  @endif>Used</option>                             
                                        
                                   
                                 
                            
                         
                        </optgroup>
                    </select>
                    @error("item.0.status")
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
              </div>
              </div>

              <div class="row">
                <div class="col-md-6 d-none">
                    <div class="form-group add">
                        <label for="projectinput1">اختصار اللغة {{__('messages.'.$edit->translation_lang)}} </label>
                        <input type="text"
                         value="{{$edit->translation_lang}}" 
                               class="form-control"
                               placeholder=""
                               name="item[0][abrr]" autocomplete="off">
                        @error("item.0.abrr")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

              </div>
              <div class="form-actions">
                <button type="button" class="btn btn-warning mr-1"
                        onclick="history.back();">
                    <i class="ft-x"></i> تراجع
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="la la-check-square-o"></i> تحديث  </button>
            </div>
            </form>
            
             </div>

              {{-- ------------------------start form anther item ---------------------- --}}
    <ul class="nav nav-tabs">
    @isset($edit ->item)
        @foreach($edit ->item  as $index =>  $translation)
            <li class="nav-item">
                <a class="nav-link @if($index ==  0) active @endif " id="homeLable-tab"  data-toggle="tab"
                    href="#homeLable{{$index}}" aria-controls="homeLable"
                    aria-expanded="{{$index ==  0 ? 'true' : 'false'}}">
                    {{$translation ->translation_lang}}</a>
            </li>
        @endforeach
        @endisset
    </ul>
    <div class="tab-content px-1 pt-1">

        @isset($edit ->item)
        @foreach($edit ->item   as $index =>  $translation)

        <div role="tabpanel" class="tab-pane  @if($index ==  0) active  @endif " id="homeLable{{$index}}"
            aria-labelledby="homeLable-tab"
            aria-expanded="{{$index ==  0 ? 'true' : 'false'}}">
            <form class="form" action="{{route('update.item.admin',$edit->id)}}"
            method="Post" enctype="multipart/form-data">
                @csrf
                           
                    <div class="row">
                    <div class="col-md-6 add">
                        <div class="form-group">
                            <label for="projectinput1">اسم المنتج {{__('messages.'.$translation->translation_lang)}}</label>
                            <input type="text" value="{{$translation->name}}" 
                                class="form-control"
                                placeholder="ادخل اسم المنتج"
                                name="item[0][name]" autocomplete="off">
                            @error("item.0.name")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 add">
                        <div class="form-group">
                            <label for="projectinput2"> أختار المتجر {{__('messages.'.$translation->translation_lang)}}</label>
                            <select name="item[0][vendor_id]" class="select2 form-control">
                                <optgroup label="من فضلك أختار المتجر">
                                    @if($vendor && $vendor->count() > 0)
                                        @foreach($vendor as $vendors)
                                        <option 
                                        value="{{$vendors->id }}" @if ($translation->vendor_id == $vendors->id)
                                                selected
                                                    
                                                @endif>{{$vendors->name}}
                                        </option>
                                                
                                        @endforeach
                                    @endif
                                </optgroup>
                            </select>
                            @error("item.0.vendor_id")
                            <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    </div>
                
            
                    <div class="row">
                        <div class="col-md-6 add">
                            <div class="form-group">
                                <label for="projectinput1">الدولة {{__('messages.'.$translation->translation_lang)}}</label>
                                <input type="text"                
                                    class="form-control"
                                    placeholder=""
                                    value="{{$translation->contry}}" 
                                    name="item[0][contry]" autocomplete="off">
                                @error("item.0.contry")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="col-md-6 add">
                            <div class="form-group">
                                <label for="projectinput1">الوصف {{__('messages.'.$translation->translation_lang)}}</label>
                                <input type="text" value="{{$translation->descrip}}"  
                                    class="form-control"
                                    placeholder=""
                                    name="item[0][descrip]" autocomplete="off">
                                @error("item.0.descrip")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div> 
                    </div> 
                    
                    <div class="row">
                        <div class="col-md-6 add">
                            <div class="form-group">
                                <label for="projectinput1">السعر {{__('messages.'.$translation->translation_lang)}}</label>
                                <input type="text"  value="{{$translation->price}}"               
                                    class="form-control"
                                    placeholder=""
                                    name="item[0][price]" autocomplete="off">
                                @error("item.0.price")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 add">
                            <div class="form-group">
                                <label for="projectinput2"> أختار الحالة {{__('messages.'.$translation->translation_lang)}}</label>
                                <select name="item[0][status]" class="select2 form-control">
                                    <optgroup label="من فضلك أختار الحالة"> 
                                                                
                                            <option value="0">---</option>
                                            <option value="1"@if ($translation->status ==1 )selected  @endif>New</option> 
                                            <option value="2"@if ($translation->status ==2 )selected  @endif>Like new</option> 
                                            <option value="3"@if ($translation->status ==3 )selected  @endif>Used</option>                             
                                                    
                                            
                                            
                                        
                                    
                                    </optgroup>
                                </select>
                                @error("item.0.status")
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        </div>
            
                        <div class="row">
                            <div class="col-md-6 d-none">
                                <div class="form-group add">
                                    <label for="projectinput1">اختصار اللغة {{__('messages.'.$translation->translation_lang)}} </label>
                                    <input type="text"
                                    value="{{$translation->translation_lang}}" 
                                        class="form-control"
                                        placeholder=""
                                        name="item[0][abrr]" autocomplete="off">
                                    @error("item.0.abrr")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
            
                        </div>
                        <div class="form-actions">
                        <button type="button" class="btn btn-warning mr-1"
                                onclick="history.back();">
                            <i class="ft-x"></i> تراجع
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="la la-check-square-o"></i> تحديث  </button>
                    </div>
                    </form>
                    
                        </div>


            @endforeach
            @endisset
       
             


     
        
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
    

  




    

    

    
@endsection




    