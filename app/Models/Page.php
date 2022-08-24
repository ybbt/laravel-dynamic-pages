<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['author_id', 'title', 'slug', 'content'];

    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
