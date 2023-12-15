@extends('layouts.admin')
@section('title','Subcategorie')
@section('content')

    <div class="container">

      <h1 class="text-center">الاقسام الفرعية</h1>
      @include('admin.includes.alerts.errors')
       @include('admin.includes.alerts.success')
       @empty($cat)
       @endempty
           
     
        <div class="table">     
          
           <table class="table table-bordered min-table">
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
               
                 <td></td>
                 <td></td>
                 <td></td>                  
                 <td></td>
                  <td>
                    <a class="btn btn-outline-success" href=""><i class="fa fa-edit" ></i>تعديل</a>
                    <a class="btn btn-outline-danger" href=""> <i class="fa fa-close "></i> حذف</a>
                    <a class="btn btn-outline-info" href=""> <i class="fa fa-check "></i>
                      {{-- @if ($cats->active == 0)
                        تفعيل
                          
                      @else
                      الغاء تفعيل
                          
                      @endif --}}
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

        

        <a class="btn btn-primary" href="{{route('admin.subcatgerie.create')}}"><i class="fa fa-plus"></i> اضافة قسم</a>
    </div>

    
@endsection
    
