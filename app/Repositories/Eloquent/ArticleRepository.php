<?php

namespace App\Repositories\Eloquent;

use App\Models\Article;
use App\Repositories\ArticleRepositoryInterface;
use Illuminate\Support\Collection;

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{

    /**
     * ArticleRepository constructor.
     *
     * @param Article $model
     */
    public function __construct(Article $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @return Model $Article
     */

    public function findArticle(Article $id)
    {
        return Parent::find($id);
    }


    public function getAllWithRelation(array $relation)
    {
        return $this->model->with($relation)->paginate(10);
    }

    /**
     * @return Collection
     */

    public function FindRelationWithId(int $id, string $relation): Collection
    {
        return $this->model->where('id', $id)->with($relation)->get();
    }

    public function createArticle(array $attributes)
    {
        return parent::create($attributes);
    }
}