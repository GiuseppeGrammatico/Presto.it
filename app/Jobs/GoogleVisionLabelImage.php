<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\AnnouncementImage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionLabelImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $announcement_image_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i = AnnouncementImage::find($this->announcement_image_id);

        if( !$i ) {return;}


        $image = file_get_contents(storage_path('/app/' . $i->file));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('2019-07-09-progetto-prestoit-user-story-7.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->labelDetection($image);
        $labels = $response->getLabelAnnotations();


        if($labels){
            $result = [];
            foreach($labels as $label){
                $result[] = $label->getDescription(); 
            }

            $i->labels = json_encode($result);
            $i->save();
        }

        $imageAnnotator->close();




        // $safe = $response->getSafeSearchAnnotation();

        // $adult = $safe->getAdult();
        // $medical = $safe->getMedical();
        // $spoof = $safe->getSpoof();
        // $violence = $safe->getViolence();
        // $racy = $safe->getRacy();

        // $likelihoodName = ['UNKNOWN', 'VERY_UNLIKELY', 'UNLIKELY', 'POSSIBLE', 'LIKELY', 'VERY_LIKELY'];

        // $i->adult = $likelihoodName[$adult];
        // $i->medical = $likelihoodName[$medical];
        // $i->spoof = $likelihoodName[$spoof];
        // $i->violence = $likelihoodName[$violence];
        // $i->racy = $likelihoodName[$racy];

        // $i->save();
    }
}
