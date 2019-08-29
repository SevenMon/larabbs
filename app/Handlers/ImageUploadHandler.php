<?php
namespace App\Handlers;

use Illuminate\Support\Str;
use Image;

class ImageUploadHandler
{
    //
    protected $allowed_ext = ["png","jpg","gif","jpeg"];

    public function save($file,$folder,$file_prefix,$max_width = false){
        $folder_name = "upload/images/$folder/".date("Ym/d",time());
        $upload_path = public_path().'/'.$folder_name;

        $extension = strtolower($file->getClientOriginalExtension())?:'png';

        $file_name = $file_prefix."_".time()."_".Str::random(10).".".$extension;


        if(!in_array($extension,$this->allowed_ext)){
            return false;
        }

        $file->move($upload_path,$file_name);

        if($max_width && $extension != 'gif'){
            $this->reduceSize($upload_path.'/'.$file_name,$max_width);
        }

        return [
            'path' => config('app.url')."/$folder_name/$file_name"
        ];
    }

    private function reduceSize($file_path,$max_width){
        $image = Image::make($file_path);

        // 进行大小调整的操作
        $image->resize($max_width, null, function ($constraint) {

            // 设定宽度是 $max_width，高度等比例双方缩放
            $constraint->aspectRatio();

            // 防止裁图时图片尺寸变大
            $constraint->upsize();
        });

        // 对图片修改后进行保存
        $image->save();
    }
}