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

class GoogleVisualabelImage implements ShouldQueue
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
        $image = file_get_contents(storage_path(('app/public/' . $i->path)));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json')); //inserisco le credenziali per google vision

        $imageAnnotator = new ImageAnnotatorClient(); 
        $response = $imageAnnotator->labelDetection($image); //trovare il contenuto dell'immagine
  

        $labels = $response->getLabelAnnotations(); //richiediamo di avere queste annotazioni

        if($labels){ //se ci sono delle label
            $result = []; //per ogni immagine andremo aggiungere la descrizione all'interno dell'array vuoto
            foreach($labels as $label){
                $result[] = $label->getDescription(); //prendiamo la descrizione e la inseriamo nel array
            }

            $i->labels = $result; //salvo nel database ma deve essere castato in array andiamo nel modello image  
            $i->save();
        }
        $imageAnnotator->close();

      
        
    }
}
