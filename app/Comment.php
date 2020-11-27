<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id', 'issue_id'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
