<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;
use App\Models\Image;

class RemoveFaces implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $article_image_id;

    public function __construct($article_image_id)
    {
        $this->article_image_id = $article_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->article_image_id);
        if(!$i){
            return;
        }
       $srcPath = storage_path('app/public/' . $i->path); //tramite id andiamo a recuperare l'immagine
       $image = file_get_contents($srcPath);

       putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json')); //inserisco le credenziali per google vision


        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->faceDetection($image);
        $faces = $response->getFaceAnnotations(); //prendiamo l'annotazione di dove si trovano le facce

        foreach($faces as $face){
            $vertices = $face->getBoundingPoly()->getVertices(); //vertici per ogni faccia cioè gli angoli del viso in modo tale da coprirlo

            $bounds = []; //limiti  pushamo una coppia di vertici x e y con all'interno 4 array
            foreach($vertices as $vertex){
                $bounds[] = [$vertex->getX() , $vertex->getY()];
            }
            $w = $bounds[2][0] - $bounds[0][0]; //per la larghezza facciamo una semplice sottrazione tra l' angolo in alto  sinistra ed in alto a destra
            $h = $bounds[2][1] - $bounds[0][1];

            $image = SpatieImage::load($srcPath);
           
            $image->watermark(base_path('resources/img/adesivi-faccia-da-cane.png')) //da passare immaggine per coprire il volto
                    ->watermarkPosition('top-left')  //lo posizioniamo in alto a sinistra
                    ->watermarkPadding($bounds[0][0], $bounds[0][1])  //padding
                    ->watermarkWidth($w    , Manipulations::UNIT_PIXELS)
                    ->watermarkHeight($h   , Manipulations::UNIT_PIXELS)
                    ->watermarkFit(Manipulations::FIT_STRETCH);
            $image->save($srcPath);
        }
        
        $imageAnnotator->close();

        
    }
}
