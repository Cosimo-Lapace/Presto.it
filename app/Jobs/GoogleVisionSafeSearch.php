<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionSafeSearch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $article_images_id;
    /**
     * Create a new job instance.
     */
    public function __construct($article_images_id)
    {
        $this->article_images_id = $article_images_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->article_images_id);
        if(!$i){
            return;
        }
        $image = file_get_contents(storage_path(('app/public/' . $i->path)));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image); // avvio questa funzione
        $imageAnnotator->close(); //chiudo il collegamento con google vision

        $safe = $response->getSafeSearchAnnotation(); //prendo questi response e li salvo 

        $adult = $safe->getAdult();  //elementi che vengono salvati una volta identificati
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();

        $likelihoodName = [
            'text-secondary fas fa-circle' , 'text-success fas fa-circle' , 'text-success fas fa-circle',  //in base al contenuto inserito cambierò la classe bootstrap 
            'text-warning fas fa-circle' , 'text-warning fas fa-circle' , 'text-danger fas fa-circle' 
        ];

        $i->adult = $likelihoodName[$adult];
        $i->medical = $likelihoodName[$medical];
        $i->spoof = $likelihoodName[$spoof];
        $i->violence = $likelihoodName[$violence];
        $i->racy = $likelihoodName[$racy];

        $i->save();
        
}
}
