<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $primaryKey = 'reply_id';

    protected $fillable = ['user_reply_id','thread_id','reply'];

    public function user()
    {

        return $this->belongsTo(User::class,'user_reply_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class,'reply_id');
    }

    public function likes()
    {
        return $this->belongsToMany(User::class,'likes','reply_id')->withPivot('is_dislike')->withTimestamps();
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
