<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';

    protected $fillable = [
        'user_id',
        'posting_id',
        'pesan',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function posting() {
        return $this->belongsTo('App\Posting');
    }
}
