<?php

namespace App\Traits;

trait Imageuploader {
   
    public function processFileUpload($file, $uploadLocation)
    {
        if (!$file) {
            return '';
        }

        $filename = $this->getFileName($file);

        \Image::make($file)->save(public_path($uploadLocation).$filename);
        
        return $filename;
    }

     
    public function getFileName($newFile)
    {
        // decode base64 image string
        // example data:image/png;base64,ivrandomstring.....
        $dataType = substr($newFile, 0, strpos($newFile, ';')); // data:image/png
        $mimeType = explode(':', $dataType)[1]; // image/png
        $extension = explode('/', $mimeType)[1]; // png
        $filename = time().'.'.$extension;
        return $filename;

    }

}