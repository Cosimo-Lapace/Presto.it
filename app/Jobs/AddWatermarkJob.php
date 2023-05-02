<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class AddWatermarkJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $path;
    protected $filename;
    protected $w;
    protected $h;
    public function __construct($filepath , $w , $h)
    {
        $this->path = dirname($filepath);  //inserisco dentro filepath ---path e file name  // dirname restituisce il nome della cartella sulla base di un percorso
        $this->filename = basename($filepath);  //basename restituisce il percorso dove viene passato l'argomento
        $this->w = $w;
        $this->h = $h;
    }

    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $scrpath = storage_path().'/app/public/'. $this->path.'/'.$this->filename;    //percorso salvataggio 
        $destpath = storage_path().'/app/public/'. $this->path."/crop_{$w}x{$h}_".$this->filename; //salvataggio immaggine croppata con le dimensioni stabilite con w e h
        $watermarkPath = public_path('/images/Soggetto.png');   //prendo immagine da utilizzare per il watermark
       $image = Image::load($scrpath)    //metodo che carica immagine del database
            ->crop(Manipulations::CROP_CENTER , $w , $h) //rendo il ridimensionamento dinamico
            ->watermark($watermarkPath)
            ->watermarkOpacity(50)
            ->watermarkPosition(Manipulations::POSITION_BOTTOM_RIGHT)
            ->watermarkHeight(200, Manipulations::UNIT_PIXELS)
            ->watermarkWidth(200, Manipulations::UNIT_PIXELS)
            ->watermarkPadding(20, 20, Manipulations::UNIT_PIXELS)
            ->save($destpath); //salvo nella destinazione creata
    }
    public function tags()
    {
        return 'watermark';
    }
}

