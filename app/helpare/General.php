<?php

use Illuminate\Support\Facades\Config;

  function getActive(){
   return App\Models\Language::active()->selected()->get();
  }
   function default_lang()
   {
   return Config::get('app.locale');
   }

   function uploadImage($folder, $image)
   {
       $image->store('/', $folder);
       $filename = $image->hashName();
       $path = 'imge/' . $folder . '/' . $filename;
       return $path;
   }

   






