<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Vendoer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index()
    {
        
        $lang= default_lang();
        $items= Item::where('translation_lang',$lang)->selected()->orderby('id','DESC')->paginate(PAGINATION_COUNT);
        return view('admin.items.index',compact('items'));
    }
    public function create()    
    {
        $vendor= Vendoer::get();
        return view('admin.items.create',compact('vendor'));
    }
    public function store(ItemRequest $request)
    {
        //return $request;
       
         try{
            $item = collect($request->item);
            $filter= $item->filter(function($value, $Key){
              return $value['abrr']  == default_lang();
  
            });
             $default_item = array_values($filter->all()) [0];
             $filePath = "";
              if ($request->has('imge')) {
  
                   $filePath =uploadImage('items', $request->imge);
               }
              DB::beginTransaction();
                   
              
              $items= Item::insertGetId([
              'translation_lang' =>  $default_item['abrr'],
              'translation_off' => 0,
              'name' =>  $default_item['name'],
              'vendor_id' =>  $default_item['vendor_id'],
              'price' =>  $default_item['price'],
              'status' =>  $default_item['status'],
              'descrip' =>  $default_item['descrip'],
              'contry' =>  $default_item['contry'],              
              'imge' =>  $filePath,
  
              ]);
  
             //insert to databases not default lang
  
             $itemss= $item->filter(function($value, $Key){
              return $value['abrr']  != default_lang();
  
              });
            if(isset($itemss) && $itemss->count()){
              $array = [];
  
              foreach($itemss as $item){
               $array[] =[
                'translation_lang' =>  $item['abrr'],
              'translation_off' =>$items,
              'name' =>  $item['name'],
              'vendor_id' =>  $item['vendor_id'],
              'price' =>  $item['price'],
              'status' =>  $item['status'],
              'descrip' =>  $item['descrip'],
              'contry' =>  $item['contry'],               
              'imge' =>  $filePath,
               ];
  
              }
  
              Item::insert($array);
              }

            DB::commit();
            return  redirect()->route('index.item.admin')->with(['success' => 'تم الحفظ بنجاح']);
    

         }catch(Exception $ex){
            return $ex;
            DB::rollback();
            return  redirect()->route('index.item.admin')->with(['error' => 'هناك خطاء ما الرجاء المحاولة']);

         }
    }
    public function edit($id)
    {
                    //scope
        $edit=Item::with('item')->selected()->find($id);
        if(!$edit){
            return redirect()->route('index.items.admin')->with(['error'=>'هذة الصفحة غير موجودة']);

        }
        $vendor=Vendoer::get();
        return view('admin.items.edit',compact('edit','vendor'));
    }
    public function update(ItemRequest $request, $id){
        try{
            $update=Item::with('item')->selected()->find($id);
            if(!$update){
                return redirect()->route('index.items.admin')->with(['error'=>'هذة الصفحة غير موجودة']);
    
            }
            $item = array_Values($request->item) [0];     

            Item::where('id',$id)->update([
             'name' => $item['name'],
             'vendor_id' =>  $item['vendor_id'],
             'price' =>  $item['price'],
             'status' =>  $item['status'],
             'descrip' =>  $item['descrip'],
             'contry' =>  $item['contry'],       

           ]);
       
           if ($request->has('imge')) {
             $filePath = uploadImage('items',$request->imge);
              Item::where('id', $id)
              ->update([
                'imge' => $filePath,
              ]);
           }
            return redirect()->route('index.item.admin')->with(['success' => 'تم التحديث بنجاح']);

        }catch(Exception $ex){
          return redirect()->route('index.items.admin')->with(['error'=>'هنالك خطاء في البيانات الرجاء المحاولة']);

        }

    }
    public function delete($id)
    {
      try{
        $delete= Item::find($id);
          
          if(!$delete){
          return redirect()->route('index.items.admin')->with(['error'=>'هذة الصفحة غير موجودة']);

             }
              
        
       
              //   $delete_vendore = $delete->vendore;
              // if(isset($delete_vendore) && $delete_vendore->count() >0){
              //    return redirect()->route('index.catgerie.admin')->with(['error'=>'لايمكن حذف هذا القسم']);
              // }

          //delete img in folder
          $img = Str::after($delete->imge, 'assets/');
          $img= base_path('assets/'.$img);
          unlink($img);
          $delete->delete();

          $delete->item()->delete();
          return redirect()->route('index.item.admin')->with(['success' => 'تم الحذف بنجاح']);


          
      }catch(Exception $ex){
          return redirect()->route('index.item.admin')->with(['error' => 'هناك خطاء ما يرجي المحاولة']);


      }     
    

    }
    public function approve($id)
    {
      try{
        $approve= Item::find($id);
          
        if(!$approve){
        return redirect()->route('index.items.admin')->with(['error'=>'هذة الصفحة غير موجودة']);

           }
           $active= $approve->active == 0 ? 1 : 0;
           $approve-> update(['active'=>$active]);
           $approve->item()->update(['active'=>$active]);

           return redirect()->route('index.item.admin')->with(['success' => 'تم التحديث بنجاح']);

      }catch(Exception $ex){
        return redirect()->route('index.item.admin')->with(['error' => 'هناك خطاء ما يرجي المحاولة']);

      }

    }

}
