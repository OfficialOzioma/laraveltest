<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface ArticleRepositoryInterface
{
    public function all(): Collection;
    public function findArticle(Article $id);
    public function FindRelationWithId(int $id, string $relation): Collection;
    public function getAllWithRelation(array $relation);
    public function createArticle(array $attributes);
}