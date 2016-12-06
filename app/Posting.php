<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    protected $table = 'posting';

    protected $fillable = [
        'judulposting',
        'user_id',
        'tanggal',
        'foto',
        'deskripsi',
        'jenisposting',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
