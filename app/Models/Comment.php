<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'thumbnail', 'article'];

    /**
     * This returns the article that the comment belongs to
     *
     * @return Model
     */

    public function Article()
    {
        return $this->belongsTo(Article::class);
    }
}
