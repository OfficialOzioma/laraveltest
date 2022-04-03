<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'thumbnail', 'article'];

    /**
     * This returns all the comments for this article
     *
     * @return Model
     */

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * This returns all the likes for this article
     *
     * @return Model
     */

    public function likes()
    {
        return $this->hasMany(Likes::class);
    }

    /**
     * This returns all the Views for this article
     *
     * @return Model
     */

    public function views()
    {
        return $this->hasMany(Views::class);
    }
}