<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'thread_id',
        'name',
        'file_path'
    ];

    public function thread()
    {
        return $this->belongsTo(Thread::class, 'thread_id');
    }
}
