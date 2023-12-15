@extends('layouts.admin')
@section('title', 'edit')
@section('edit_categorie')
<div class="container">
   <div class="card-body lang">
        @include('admin.includes.alerts.errors')
        @include('admin.includes.alerts.success')
        <h1 class="form-section text-center"><i class="ft-home"></i> تعديل القسم</h1>
       
     <form class="form" action="{{route('update.cat.admin',$edit->id)}}"
       method="Post" enctype="multipart/form-data">
       @csrf
       <input name="id" value="{{$edit ->id}}" type="hidden">

     <div class="form-group">
        <div class="text-center">
           <img
          src="{{$edit ->imge }}"
           alt="صورة القسم  ">
       </div>
     </div>
  
     <div class="row">
        <div class="col-md-6">
            <div class="form-group add">
                <label for="projectinput1">صورةالقسم</label>
                <input type="file" id="file" value="" 
                       class="form-control"
                       placeholder=""
                       name="imge">
                @error("imge")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        
    </div>
   
    
  
   
      
          
  
          <div class="row">
        <div class="col-md-6">
            <div class="form-group add">
                <label for="projectinput1">{{__('messages.'.$edit->translation_lang	)}}اسم القسم</label>
                <input type="text" 
                      value="{{$edit->name}}" 
                       class="form-control"
                       placeholder="ادخل اسم القسم "
                       name="cat[0][name]" autocomplete="off">
                @error("cat.0.name")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 d-none">
            <div class="form-group add">
                <label for="projectinput1">{{__('messages.'.$edit->translation_lang	)}} اختصار اللغة</label>
                <input type="text"
                 value="{{$edit->translation_lang}}" 
                       class="form-control"
                       placeholder=""
                       name="cat[0][abrr]" autocomplete="off">
                @error("cat.0.abrr")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        


   





    <div class="row">

        <div class="col-md-6 add">
            <div class="form-group mt-1">
                <input type="checkbox" 
                @if ($edit->active == 1)
                   checked
                  
                 
                     
                 @else
                 
                     
                 @endif
                  
                       name="cat[0][active]"
                       id="switcheryColor4"
                       class="switchery" data-color="success"
                       />
                <label for="switcheryColor4"
                       class="card-title ml-1">الحالة </label>

                @error("cat.0.active")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
    </div>
  </div>

        



    <div class="form-actions ">
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
 <ul class="nav nav-tabs">
    @isset($edit ->categorie)
        @foreach($edit ->categorie  as $index =>  $translation)
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

      @isset($edit ->categorie)
        @foreach($edit ->categorie   as $index =>  $translation)

        <div role="tabpanel" class="tab-pane  @if($index ==  0) active  @endif " id="homeLable{{$index}}"
         aria-labelledby="homeLable-tab"
         aria-expanded="{{$index ==  0 ? 'true' : 'false'}}">

        <form class="form"
              action="{{route('update.cat.admin',$translation ->id)}}"
              method="POST"
              enctype="multipart/form-data">
            @csrf

            {{-- <input name="id" value="{{$translation -> id}}" type="hidden"> --}}


            <div class="form-body">

                <div class="row">
                    <div class="col-md-6 add">
                        <div class="form-group">
                            <label for="projectinput1"> اسم القسم
                                - {{__('messages.'.$translation ->translation_lang)}} </label>
                            <input type="text" id="name"
                                   class="form-control"
                                   
                                   value="{{$translation -> name}}"
                                   name="cat[0][name]">
                            @error("cat.0.name")
                            <span class="text-danger"> هذا الحقل مطلوب</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6 d-none">
                        <div class="form-group">
                            <label for="projectinput1"> أختصار
                                اللغة {{__('messages.'.$translation ->translation_lang)}} </label>
                            <input type="text" id="abbr"
                                   class="form-control"
                                   placeholder="  "
                                   value="{{$translation -> translation_lang}}"
                                   name="cat[0][abrr]">

                            @error("cat.0.abrr")
                            <span class="text-danger"> هذا الحقل مطلوب</span>
                            @enderror
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-1">
                            <input type="checkbox" value="1"
                                   name="cat[0][active]"
                                   id="switcheryColor4"
                                   class="switchery" data-color="success"
                                   @if($translation ->active == 1)checked @endif/>
                            <label for="switcheryColor4"
                                   class="card-title ml-1">الحالة  </label>

                            @error("cat.0.active")
                            <span class="text-danger"> </span>
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
                <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> تحديث
                </button>
            </div>
        </form>
    </div>

        @endforeach
      @endisset


 

 
 </div>
    
@endsection
    
