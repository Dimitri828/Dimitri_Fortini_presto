<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Image\Enums\AlignPosition;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Image;
use Spatie\Image\Enums\ImageDriver;
use Spatie\Image\Enums\Unit;

use function Laravel\Prompts\text;

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
        ->brightness(-20)
        ->watermark(
            base_path("resources/img/watermark1.png"),
            AlignPosition::BottomRight,
            paddingX:8,
            paddingY:8,
            width:100,
            height:100,
            

        )
        ->save($destPath);
    }
}
