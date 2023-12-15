@extends('layouts.admin')
@section('title','vendore')
@section('index_vendore')

    <div class="container">

      <h1 class="text-center">المتاجر</h1>
      @include('admin.includes.alerts.errors')
       @include('admin.includes.alerts.success')
       
       
           
      
        <div class="table">     
          
           <table class="table table-bordered min-table">
             <tr>
          
                <th>الاسم</th>             
                <th>الهاتف</th> 
                <th>الميل</th>  
                <th>القسم</th>             
                <th>الحالة</th>                
                <th>الاجراءات</th>
           
             </tr>
             
                 
             
                 
             
                @isset($vendores)
         
             
                 @foreach ($vendores  as $vendore)
                 <tr>
               
                 <td>{{$vendore ->name}}</td>
                 <td>{{$vendore ->phone}}</td>
                 <td>{{$vendore ->email}}</td>   
                  <td>{{$vendore ->categoriy->name}}</td>                 
                 <td>{{$vendore ->getactive()}}</td>
                  <td>
                    <a class="btn btn-outline-success" href="{{route('edit.vendore.admin',$vendore->id)}}"><i class="fa fa-edit" ></i>تعديل</a>
                    <a class="btn btn-outline-danger" href="{{route('delete.vendore.admin',$vendore->id)}}"> <i class="fa fa-close "></i> حذف</a>
                    <a class="btn btn-outline-info" href="{{route('approve.vendore.admin',$vendore->id)}}"> <i class="fa fa-check "></i> 
                      @if ($vendore->active == 1)
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

        

        <a class="btn btn-primary" href="{{route('cearte.vendore.admin')}}"><i class="fa fa-plus"></i> اضافة متجر</a>
    </div>

    
@endsection
    
