<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Image;
use Spatie\Image\Enums\ImageDriver;
use Spatie\Image\Enums\Unit;
class ResizeImage implements ShouldQueue
{
    use Queueable;

    private $w,$h,$fileName,$path;
    
    public function __construct($filePath,$w,$h)
    {
        $this->w=$w;
        $this->h=$h;
        $this->fileName= basename($filePath);
        $this->path= dirname("$filePath");
    }
    
    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w =$this->w;
        $h =$this->h;
        $srcPath=storage_path()."/app/public/".$this->path."/".$this->fileName;
        $destPath=storage_path()."/app/public/".$this->path."/crop_{$w}x{$h}_".$this->fileName;
        
        Image::useImageDriver(ImageDriver::Gd)->load($srcPath)
        ->crop($w,$h, CropPosition::Center)
        ->watermark(
            base_path("resources/img/watermark.png"),
            paddingX:5,
            paddingY:5,
            width:50,
            height:50,
            paddingUnit:Unit::Percent

        )
        ->save($destPath);
    }
}
