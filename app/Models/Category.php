<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use HasFactory;
    use Searchable;

    public function threads()
    {
        return $this->belongsToMany(Thread::class,'categories_thread','category_id','thread_id');
    }
}
