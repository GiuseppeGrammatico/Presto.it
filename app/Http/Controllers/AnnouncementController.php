<?php

namespace App\Http\Controllers;

use App\Jobs\Watermark;
use Spatie\Image\Image;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Spatie\Image\Manipulations;
use App\Models\AnnouncementImage;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::where('is_accepted' , true)->orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        // $images = AnnouncementImages::all();
        return view('announcement.index', compact('announcements'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $uniqueSecret = $request->old('uniqueSecret',base_convert(sha1(uniqid(mt_rand())), 16, 36));
        $categories = Category::all();
        return view('announcement.create', compact('categories', 'uniqueSecret'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {


        $announcement = Announcement::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'price' => $request->price
        ]);

        $uniqueSecret = $request->input('uniqueSecret');
        $images = session()->get("images.{$uniqueSecret}", []); // l'array vuoto indica che se non dovesse arrivare nessuna immagine dalla sessione, il parametro
                                                                //ricevuto sarà un array null.
        
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);


        // dd($removedImages);
        $images = array_diff($images, $removedImages);


            foreach ($images as $image) {
                $i = new AnnouncementImage();
                $fileName = basename($image);
                $newFileName = "public/announcements/{$announcement->id}/{$fileName}";

                Storage::move($image, $newFileName);

                // dispatch(new ResizeImage(
                //     $newFileName,
                //     376,
                //     300
                // ));

                $i->file = $newFileName;
                $i->announcement_id = $announcement->id;
                $i->save();
                

                // dispatch(new GoogleVisionSafeSearchImage($i->id));
                // dispatch(new GoogleVisionLabelImage($i->id));

                // dispatch(new Watermark());
                
                GoogleVisionSafeSearchImage::withChain([
                    new GoogleVisionLabelImage($i->id),
                    new GoogleVisionRemoveFaces($i->id),
                    new ResizeImage($i->file, 376, 300),
                    // new Watermark($i->id)
                ])->dispatch($i->id);
                    
               
            }
            
        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect(route('homepage'))->with('flash', 'Hai inserito correttamente il tuo annuncio, verrà reso visibile una volta revisionato!');
    }





    public function uploadImage(Request $request){

        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));

        session()->push("images.{$uniqueSecret}", $fileName);


        return response()->json(
            [
                'id' => $fileName,
            ]
        );
    }




    public function removeImage(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');

        $fileName = $request->input('id');
        session()->push("removedimages.{$uniqueSecret}", $fileName);

        Storage::delete($fileName);
        return response()->json('ok');
    }


    public function getImages(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');
        $images = session()->get("images.{$uniqueSecret}", []); // l'array vuoto indica che se non dovesse arrivare nessuna immagine dalla sessione, il parametro
                                                                //ricevuto sarà un array null.
        
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);


        
        $images = array_diff($images, $removedImages);

        $data = [];

        foreach ($images as $image) {
            $data[] = [
                'id' => $image,
                'src' => AnnouncementImage::getUrlByFilePath($image,120,120),
            ];
        }
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        
        return view ('announcement.show', compact('announcement'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    }








    public function showByCategory(Announcement $announcement){      
        $category = $announcement->category_id;
        $announcements = Announcement::where('category_id', $category)->paginate(5);
        return view('announcement.showByCategory', compact('announcements', 'category'));
    }

    public function showByCategoryNav(Category $category){
        // $announcements = Announcement::where('category_id', $id)->paginate(5);
        $id = $category->id;
        $category = Category::find($id);
        $announcements = $category->announcements()->paginate(5);
        
        // 

        return view('announcement.showByCategory', compact('category', 'announcements'));
    }
}
