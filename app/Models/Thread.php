<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Kyslik\ColumnSortable\Sortable;

class Thread extends Model
{
    use HasFactory;
    use Searchable;
    use Sortable;

    protected $primaryKey = 'thread_id';

    protected $fillable = ['title, thread_text'];

    public $sortable = ['title','created_at'];

    public function replies()
    {
        return $this->hasMany(Reply::class,'thread_id');
    }

    public function user()
    {

        return $this->belongsTo(User::class,'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'categories_thread','thread_id');
    }

    public function topicFiles()
    {
        return $this->hasMany(TopicFile::class,'thread_id');
    }

    public function toSearchableArray()
    {
        return
        [
            'title' => $this->title,
            'thread_text' => $this->thread_text
        ];
    }
}
