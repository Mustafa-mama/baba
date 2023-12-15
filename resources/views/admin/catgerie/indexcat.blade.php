@extends('layouts.admin')
@section('title','categorie')
@section('catgerie')

    <div class="container">

      <h1 class="text-center">الاقسام الرئسية --- <a class="text-decoration-none" href="{{route('index.subcategorie.admin')}}">الاقسام الفرعية</a> </h1>
      @include('admin.includes.alerts.errors')
       @include('admin.includes.alerts.success')
       @empty($cat)
       @endempty
           
     
        <div class="table">  

          
           <table class="table table-bordered min-table havoer">
             <tr>
          
                <th>الاسم</th>             
                <th>اللغة</th> 
                <th>الصورة</th>               
                <th>الحالة</th>                
                <th>الاجراءات</th>
           
             </tr>
             
                @isset($cat)
             
                 @foreach ($cat  as $cats)
                 <tr>
               
                 <td>{{$cats ->name}}</td>
                 <td>{{default_lang()}}</td>
                 <td><img  src="{{$cats->imge}}" alt=""></td>                  
                 <td>{{$cats -> getActive()}}</td>
                  <td>
                    <a class="btn btn-outline-success" href="{{route('edit.cat.admin',$cats->id)}}"><i class="fa fa-edit" ></i>تعديل</a>
                    <a class="btn btn-outline-danger" href="{{route('delete.cat.admin' ,$cats->id)}}"> <i class="fa fa-close "></i> حذف</a>
                    <a class="btn btn-outline-info" href="{{route('approve.cat.admin',$cats->id)}}"> <i class="fa fa-check "></i>
                      @if ($cats->active == 0)
                        تفعيل
                          
                      @else
                      الغاء تفعيل
                          
                      @endif
                       </a>
                  </td>
                </tr> 
                 @endforeach
                
                @endisset
             

           </table>          
          

         

           
        </div>
     
          {{-- end div table --}}
          <div class="justify-content-center d-flex">
            {{-- {{ $cat -> links();}} --}}

          </div>

        

        <a class="btn btn-primary" href="{{route('add.catgerie.admin')}}"><i class="fa fa-plus"></i> اضافة قسم</a>
    </div>

    
@endsection
    
