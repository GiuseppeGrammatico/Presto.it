<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Announcement;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'body',
        'price',
        'user_id',
        'category_id',
    ];

    public function ToSearchableArray(){


        $array = [

            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'category'=> $this->category,

        ];
        return $array;
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    static public function ToBeRevisionedCount(){
        return Announcement::where('is_accepted' , null)->count();
    }

    public function images(){
    return $this->hasMany(AnnouncementImage::class);
    }
}