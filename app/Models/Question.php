<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    // public function weightage()
    // {
    //     return $this->belongsTo(Weightage::class);
    // }
}