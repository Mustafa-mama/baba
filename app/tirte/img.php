<?php
namespace App\tirt;

trait  img {
    function save_img($folder ,$imgae)
    {
        $file = $imgae->getClientOriginalExtension();
        $file_name = time().'.'.$file;
        $path = $folder;
        $imgae->move($path,$file_name);
        return $file_name;
    }
}
