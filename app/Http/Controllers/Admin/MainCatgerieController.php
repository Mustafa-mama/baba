<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategorieRequest;
use App\Models\Categrie;
use DeepCopy\Filter\Filter;
use Exception;


use App\tirte\img;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class MainCatgerieController extends Controller
{
    
    public function index()
    {
        
        $lang= default_lang();
        $cat= Categrie::where('translation_lang',$lang)->selected()->orderby('id','DESC')->paginate(PAGINATION_COUNT);
        return view('admin.catgerie.indexcat',compact('cat'));
    }
    public function cearte()
    {
        return view('admin.catgerie.add');
    }
    public function store(CategorieRequest $request)    
    {
       //insert to databases  default lang
     



        try{
          $catgorie = collect($request->cat);
          $filter= $catgorie->filter(function($value, $Key){
            return $value['abrr']  == default_lang();

          });
           $default_cat = array_values($filter->all()) [0];
           $filePath = "";
            if ($request->has('imge')) {

                 $filePath =uploadImage('categorie', $request->imge);
             }
            DB::beginTransaction();
                 
            
            $cat= Categrie::insertGetId([
            'translation_lang' =>  $default_cat['abrr'],
            'tarnslation_off' => 0,
            'name' =>  $default_cat['name'],
            'sulg' =>  $default_cat['name'],
            'imge' =>  $filePath,

            ]);

           //insert to databases not default lang

           $catgories= $catgorie->filter(function($value, $Key){
            return $value['abrr']  != default_lang();

            });
          if(isset($catgories) && $catgories->count()){
            $array = [];

            foreach($catgories as $cats){
             $array[] =[
            'translation_lang' =>  $cats['abrr'],
            'tarnslation_off' => $cat,
            'name' =>  $cats['name'],
            'sulg' =>  $cats['name'],
            'imge' =>  $filePath,
             ];

            }

            Categrie::insert($array);
            }
            DB::commit();
            return  redirect()->route('index.catgerie.admin')->with(['success' => 'تم الحفظ بنجاح']);
    
        }catch(Exception  $ex){
            DB::rollback();
            
            
            return  redirect()->route('index.catgerie.admin')->with(['error' => 'هناك خطاء ما الرجاء المحاولة']);

         }

       

    }
    public function edit($id){
      $edit = Categrie::with('categorie')->selected()->find($id);
      
      if(!$edit){
        return  redirect()->route('index.catgerie.admin',$id)->with(['error' => 'هذة الصفحة غير موجودة']);

      }
      return view('admin.catgerie.edit',compact('edit'));


    }
    public function update(CategorieRequest $request , $id)    
    {
      
      
      try{
      $edits = Categrie::selected()->find($id);
       if(!$edits){
        return  redirect()->route('index.catgerie.admin',$id)->with(['error' => 'هذة الصفحة غير موجودة']);

      }
   
      $cat = array_Values($request-> cat) [0];
      if(!$request->has('cat.0.active')){
        $request->request->add(['active' => 0]);

      }else{
        $request->request->add(['active' => 1]);

      }

       Categrie::where('id',$id)->update([
        'name' => $cat['name'],
        'active' => $request-> active,

       ]);

       
       if ($request->has('imge')) {
        $filePath = uploadImage('categorie', $request->imge);
    Categrie::where('id', $id)
            ->update([
                'imge' => $filePath,
            ]);
    }
       return redirect()->route('index.catgerie.admin')->with(['success' => 'تم التحديث بنجاح']);


      
           

      }catch(Exception $ex){
        
        return redirect()->route('index.catgerie.admin')->with(['error' => 'هناك خطاء ما يرجي المحاولة']);

      }

      
    }

    public function delete($id) 
    {
      try{
        $delete = Categrie::find($id);
        if(!$delete){
        return redirect()->route('index.catgerie.admin',$id)->with(['error'=>'هذة الصفحة غير موجودة']);
       }
         $delete_vendore = $delete->vendore;
          if(isset($delete_vendore) && $delete_vendore->count() >0){
            return redirect()->route('index.catgerie.admin')->with(['error'=>'لايمكن حذف هذا القسم']);
          }

          //delete img in folder
          $img = Str::after($delete->imge, 'assets/');
          $img= base_path('assets/'.$img);
          unlink($img);
          $delete->delete();
          $delete->categorie()->delete();
          return redirect()->route('index.catgerie.admin')->with(['success' => 'تم الحذف بنجاح']);


          
        }catch(Exception $ex){
          return redirect()->route('index.catgerie.admin')->with(['error' => 'هناك خطاء ما يرجي المحاولة']);


        }     
    }
    public function approve($id)
    {
     $approve = Categrie::find($id);
     try{
       if(!$approve){
        return redirect()->route('index.catgerie.admin',$id)->with(['error'=>'هذة الصفحة غير موجودة']);

         } 
         $active= $approve->active == 0 ? 1 : 0;
         $approve-> update(['active'=>$active]);
         $approve->categorie()->update(['active'=>$active]);

         return redirect()->route('index.catgerie.admin')->with(['success'=>'تم التفعيل بنجاح']);
     }catch(Exception $ex){
      return redirect()->route('index.catgerie.admin')->with(['error' => 'هناك خطاء ما يرجي المحاولة']);


     }

    }
}

