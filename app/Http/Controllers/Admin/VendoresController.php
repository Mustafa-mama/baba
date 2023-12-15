<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendoreRequest;
use App\Models\Categrie;
use App\Models\Vendoer;
use App\Notifications\CreatedVendor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class VendoresController extends Controller
{
    //

    public function index()
    {
                             //SCOPE
        $vendores = Vendoer::selected()->orderby('id','DESC')->paginate(PAGINATION_COUNT);
          //return $vendores->categoriy;
        return view('admin.vendore.index' ,compact('vendores'));
    }
    public function cearte()    
    {
                                
        $categories = Categrie::where('tarnslation_off','0')->active()->get();
        return view('admin.vendore.cearte',compact('categories'));
    }
    public function store(VendoreRequest $request)
    {
        //valdition in request
        
        // insert in database


        
        try{
           $vendor= Vendoer::create([
                'name' => $request ->name,
                'cat_id' => $request ->cat_id,
                'email' => $request ->email,
                'password' =>$request->password,
                'phone' => $request ->phone,               
                'addres' => $request ->addres,

            ]);
           // Notification::send($vendor, new CreatedVendor($vendor));
            return redirect()->route('index.vendore.admin')->with(['success' => 'تم ارسال البيانات بنجاح ']);

        }catch(Exception $ex){
            return $ex;
            return redirect()->route('index.vendore.admin')->with(['error' => 'هناك خطاء ما الرجاء المحاولة']);


        }


    }  
    public function edit($id) 
    {
        try{
            $edit= Vendoer::selected()->find($id);
            
            if(!$edit){
                return redirect()->route('index.vendore.admin')->with(['error' => 'هذة الصفحة غير موجودة']);
            }
           $categories = Categrie::where('tarnslation_off','0')->active()->get();
            return view('admin.vendore.edit',compact('edit','categories'));

        }catch(Exception $ex){
            return redirect()->route('index.vendore.admin')->with(['error' => 'هناك خطاء ما الرجاء المحاولة']);

        }
    } 
    public function update($id, VendoreRequest $request)
    {
        try{
            $edit= Vendoer::selected()->find($id);
            
            if(!$edit){
                return redirect()->route('index.vendore.admin')->with(['error' => 'هذة الصفحة غير موجودة']);
            }
            $data = $request->except('_token','id','password');
            if($request->has('password') && !is_null($request->password)){
                $data['password'] = bcrypt($request->password);
            }
            Vendoer::where('id',$id)->update($data);

            return redirect()->route('index.vendore.admin')->with(['success' => 'تم التحديث بنجاح']);


        }catch(Exception $ex){
            
            return redirect()->route('index.vendore.admin')->with(['error' => 'هناك خطاء ما الرجاء المحاولة']);


        }

    }
    public function delete($id)
    {
        try{
         $delete = Vendoer::find($id);
         if(!$delete){
            return redirect()->route('index.vendore.admin')->with(['error' => 'هذة الصفحة غير موجودة']);

          }
          $delete->delete();
          return redirect()->route('index.vendore.admin')->with(['success' => 'تم الحذف بنجاح']);
        }catch(Exception $ex){
            return redirect()->route('index.vendore.admin')->with(['error' => 'هناك خطاء ما الرجاء المحاولة']);

        }
    }
    public function approve($id)
    {
        try{
        $approve = Vendoer::selected()->find($id);
        if(!$approve){
           return redirect()->route('index.vendore.admin')->with(['error' => 'هذة الصفحة غير موجودة']);

         }
         if($approve->active == 0){
           $approve-> update(['active'=> 1]);
         }else{
            $approve-> update(['active'=> 0]);

         }

         return redirect()->route('index.vendore.admin')->with(['success' => 'تم التفعيل بنجاح']);

       
         
       }catch(Exception $ex){
        return $ex;
           return redirect()->route('index.vendore.admin')->with(['error' => 'هناك خطاء ما الرجاء المحاولة']);

       }

    }
 
}
