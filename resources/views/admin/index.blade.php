@extends('layouts.admin')
@section('title' ,'index')
@section('index')
<div class="container">
    <div class="box  text-center">
        <div class="row">
          <h2 class="text-center"> الاحصائيات</h2>
            <div class="col-lg-4">
                <div class="cat">
                    <h3>كل الاقسام</h3>
                    <a  href="{{route('index.catgerie.admin')}}">
                    <i class="fa fa-user"></i> <span>{{\App\Models\Categrie::where('translation_lang','ar')->count()}}</span>
                    </a>
                   
                </div>
            </div>

            <div class="col-lg-4">
                <div class="cat">
                    <h3>كل المتاجر</h3>
                    <a href="">
                  <i class="fa fa-user"></i> <span>{{\App\Models\Vendoer::count()}}</span> 
                    </a>              
                    
                    
                </div>
            </div>

            <div class="col-lg-4">
                <div class="cat">
                    <h3>كل المنتجات</h3>
                    <i class="fa fa-plus"></i> <span>{{\App\Models\Item::where('translation_lang','ar')->count()}}</span>
                
                </div>
            </div>

        </div>
    </div>
</div>
 

    
@endsection
    
