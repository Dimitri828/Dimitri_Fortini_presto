<?php

namespace App\Jobs;

use Google\Cloud\Vision\V1\AnnotateImageRequest;
use Google\Cloud\Vision\V1\BatchAnnotateImagesRequest;
use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Image;
use Google\Cloud\Vision\V1\Feature\Type;
use Google\Cloud\Vision\V1\Image as VisionImage;

class GoogleVisionSafeSearch implements ShouldQueue
{
    use Queueable;

    private $article_image_id;

    public function __construct($article_img_id)
    {
        $this->article_image_id=$article_img_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i=Image::find($this->article_image_id);
        if (!$i) {
            return;
        }

        $image=file_get_contents(storage_path("app/public/". $i->path));
        putenv("GOOGLE_APPLICATION_CREDENTIALS=".base_path("google_credential.json"));
        
        $googleVisionClient= new ImageAnnotatorClient();
        $google_image = new VisionImage(["content"=>$image]);

        $googleFeature=new Feature();
        $googleFeature->setType(Type::SAFE_SEARCH_DETECTION);

        $request= new AnnotateImageRequest();
        $request->setImage($google_image);
        $request->setFeatures([$googleFeature]);

        $batchRequest = new BatchAnnotateImagesRequest();
        $batchRequest->setRequests([$request]);


        $responseBatch=$googleVisionClient->batchAnnotateImages($batchRequest);
        $response = $responseBatch->getResponses();
        $googleVisionClient->close();

        $safeSearchAnnotation =$response[0]->getSafeSearchAnnotation();
        $adult=$safeSearchAnnotation->getAdult();
        $spoof=$safeSearchAnnotation->getSpoof();
        $medical=$safeSearchAnnotation->getMedical();
        $violence=$safeSearchAnnotation->getViolence();
        $racy=$safeSearchAnnotation->getRacy();

        $likeliHoodName=[
            "text-secondary bu bi-circle-fill",
            "text-success bi bi-check-circle-fill",
            "text-success bi bi-check-circle-fill",
            "text-warning bi bi-exclamation-circle-fill",
            "text-warning bi bi-exclamation-circle-fill",
            "text-danger bi bi-dash-circle-fill"
        ];

        $i->adult=$likeliHoodName[$adult];
        $i->spoof=$likeliHoodName[$spoof];
        $i->medical=$likeliHoodName[$medical];
        $i->violence=$likeliHoodName[$violence];
        $i->racy=$likeliHoodName[$racy];
        $i->save();

    }
}
