<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];
    use SoftDeletes;

    public function author()
    {
        return $this->belongsTo('App\Models\Author');
    }
}
