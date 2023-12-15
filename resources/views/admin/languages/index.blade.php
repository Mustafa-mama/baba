@extends('layouts.admin')
@section('title','Languages')
@section('languages')

    <div class="container">

      <h1 class="text-center">اللغات </h1>
      @include('admin.includes.alerts.errors')
       @include('admin.includes.alerts.success')
        <div class="table">     
          
           <table class="table table-bordered min-table">
             <tr>
          
                <th>الاسم</th>
                <th>الاسم المحلي</th>
                <th>الاختصار</th>
                <th>اتجاه اللغة </th>
                <th>الحالة</th>                
                <th>الاجراءات</th>
           
             </tr>
             
                @isset($lang)
             
                 @foreach ($lang  as $langs)
                 <tr>
               
                 <td>{{$langs ->name}}</td>
                 <td>{{$langs ->local}}</td>
                 <td>{{$langs ->abrr}}</td>
                 <td>{{$langs ->direction}}</td>
                 <td>{{$langs -> getActive()}}</td>
                  <td>
                    <a class="btn btn-outline-success" href="{{route('edit.admin', $langs->id)}}"><i class="fa fa-edit" ></i>تعديل</a>
                    <a class="btn btn-outline-danger" href="{{route('delete.lang.admin', $langs->id)}}"> <i class="fa fa-close "></i> حذف</a>
                    <a class="btn btn-outline-danger" href="{{route('approve.lang.admin', $langs->id)}}"> <i class="fa fa-close "></i>
                      @if ($langs->active == 0)
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

        <a class="btn btn-primary" href="{{route('addlang.admin')}}"><i class="fa fa-plus"></i> اضافة لغة</a>
    </div>

    
@endsection
    
