<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
 



    protected $fillable = [

        'title',
        'description',
        'user_id',
        'created_at',
        'slug'
    ];



     
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title' 
            ]
        ];
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->isoFormat('ddd Do \of MMMM YYYY, h:mm:ss a') ;
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->isoFormat('ddd Do \of MMMM YYYY, h:mm:ss a') ;
    }


    public function user() //foreign key user_id
    {
        return $this->belongsTo(User::class);
    }
}
