@extends('layouts.admin')
@section('title','item')
@section('index_item')

    <div class="container">

      <h1 class="text-center">المنتجات</h1>
      @include('admin.includes.alerts.errors')
       @include('admin.includes.alerts.success')
       
       
           
      
        <div class="table">     
          
           <table class="table table-bordered min-table">
             <tr>
          
                <th>الاسم</th>             
                 <th>الصورة</th>
                <th>المتجر</th>  
                <th>الوصف</th> 
                <th>السعر</th>             
                <th>الدولة</th>  
                <th>الحالة</th> 
                <th>الاجراءات</th>
           
             </tr>
             
                 
             
                 
             
                @isset($items)
         
             
                 @foreach ($items  as $item)
                 <tr>
               
                 <td>{{$item ->name}}</td>
                 <td><img src="{{$item ->imge}}" alt="item"></td>
                 <td>{{$item ->vendor->name}}</td> 
                 <td>{{$item ->descrip}}</td>
                 <td>{{$item ->price.'$'}}</td> 
                 <td>{{$item ->contry}}</td>              
                 <td>
                  
                      
                  @switch($item ->status )
                      @case(1)
                        جديد
                          
                          @break
                      @case(2)
                       شبه جديد
                          
                          @break
                          @case(3)
                         مستعمل
                          
                          @break
                      @default
                          
                  @endswitch
                      
                  
                  
                </td>
                  <td>
                    <a class="btn btn-outline-success box-shadow-3 mr-1 mb-1" href="{{route('edit.item.admin',$item->id)}}"><i class="fa fa-edit" ></i>تعديل</a>
                    <a class="btn btn-outline-danger box-shadow-3 mr-1 mb-1" href="{{route('delete.item.admin',$item->id)}}"> <i class="fa fa-close "></i> حذف</a>
                    <a class="btn btn-outline-info box-shadow-3 mr-1 mb-1" href="{{route('approve.item.admin',$item->id)}}"> <i class="fa fa-check "></i> 
                      @if ($item->active == 1)
                        الغاء تفعيل
                      
                            
                        @else
                            
                        تفعيل
                          
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

        

        <a class="btn btn-primary" href="{{route('create.item.admin')}}"><i class="fa fa-plus"></i> اضافة منتج</a>
    </div>

    
@endsection
    
