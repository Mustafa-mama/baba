<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguagesRequest;
use App\Models\Language;
use Exception;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public function langindex()    
    {
        $lang = Language::selected()->orderby('id','DESC')->paginate(PAGINATION_COUNT);
        return view('admin.languages.index',compact('lang'));
    }

    public function addlang()
    {
        return view('admin.languages.addlanguages');
    }

    public function store(LanguagesRequest $request)    
     {
          try{
              Language::create($request->except(['_token']));
           return redirect()->route('lang.admin')->with(['success'=> 'تم الحفظ بنجاح']);

           }catch(Exception $e){
              return redirect()->route('lang.admin')->with(['error'=> 'هناك خطاء في البيانات']);      }
     
    }
    public function edit($id)
    {
        $edit = Language::selected()->find($id);
        if(!$edit){
            return redirect()->route('lang.admin')->with(['error'=>'هذة الصفحة غير موجودة']);

        }
        return view('admin.languages.edit',compact('edit'));
    }

    public function update($id, LanguagesRequest $request)
    {
        try{
           $edit = Language::find($id);
           if(!$edit){
            return redirect()->route('edit.admin',$id)->with(['error'=>'هذة الصفحة غير موجودة']);

           }
           if(!$request->has('active'))
            $request->request->add(['active' => 0]);
           
            $edit->update($request->except(['_token']));
             return redirect()->route('lang.admin')->with(['success'=> 'تم التحديث بنجاح']);
        }catch(Exception $e){
            return redirect()->route('lang.admin')->with(['error'=> 'هناك خطاء في البيانات']); 

        }

    }
    public function delete($id)
    {    
         try{
            $delete = Language::find($id);
            if(!$delete){
             return redirect()->route('lang.admin',$id)->with(['error'=>'هذة الصفحة غير موجودة']);
 
            }
             $delete->delete();
              return redirect()->route('lang.admin')->with(['success'=> 'تم الحذف بنجاح ']); 
              }catch(Exception $e){
             return redirect()->route('lang.admin')->with(['error'=> 'هناك خطاء في البيانات']); 
            }
 
          
    }
    public function approve($id)
    { 
        try{
        $approve = Language::find($id);
        if(!$approve){
         return redirect()->route('lang.admin',$id)->with(['error'=>'هذة الصفحة غير موجودة']);

        }
        $active= $approve->active == 0 ? 1 : 0;
        $approve->update(['active'=> $active]);

        return redirect()->route('lang.admin')->with(['success'=> 'تم التفعيل بنجاح']); 
    }catch(Exception $e){
   return redirect()->route('lang.admin')->with(['error'=> 'هناك خطاء في البيانات']); 
  }

    }
      

        
     

    
}
