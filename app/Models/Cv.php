<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $with = [
        'position'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
