<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function threads()
    {
        return $this->belongsToMany(Threads::class,'categories_thread','thread_id');
    }
}
