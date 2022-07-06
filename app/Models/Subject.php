<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
