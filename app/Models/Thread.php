<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $primaryKey = 'thread_id';

    protected $fillable = ['title, thread_text'];

    public function replies()
    {
        return $this->hasMany(Reply::class,'thread_id');
    }
/*    public function addReply($reply)
    {
        $reply = $this->replies()->create($reply);

        return $reply;
    }
    */

    public function user()
    {

        return $this->belongsTo(User::class,'user_id');
    }
}
