<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    // uploadImage

    private $disks = ['products'];
    private $disk = 'products';


    public function __constructor($disk = 'default'){
        $this->setDisk($disk);
    }


    public function setDisk($disk){
        if(!in_array($disk, Storage::disk()->allDisks())){
            throw new \InvalidArgumentException('The disk does not exist. Setting default');
        }
        $this->disk = $disk;
    }

    /**
     * This function is responsible for uploading image
     *
     */
    public function imageUpload($file)
    {
        // Hash name
        $filename = $file->hashName();

        // Store in directory
        Storage::disk($this->disk)->putFileAs('', $file, $filename);

        // Return path
        return $filename;
    }

    public function fileExist($filename){
        return Storage::disk($this->disk)->exists($filename);
    }

    /**
     * Deletes the existing image of a product
     *
     */
    public function removeExistingImage($filename){
        if ($this->fileExist($filename)) {
            // NOTE::FOR TESTING, DO NOT REMOVE PREVIOUS IMAGE
            // Storage::disk('products')->delete($filename);
            return true;
        }

        return false;
    }
}

