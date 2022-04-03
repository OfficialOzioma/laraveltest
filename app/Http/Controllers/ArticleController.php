<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Resources\ArticleCollection;
use App\Repositories\ArticleRepositoryInterface;


/**
 * @OA\Info(
 *      version="1.0.0",
 *      x={
 *          "logo": {
 *              "url": "https://via.placeholder.com/190x90.png?text=L5-Swagger"
 *          }
 *      },
 *      title="L5 OpenApi",
 *      description="L5 Swagger OpenApi description",
 *      @OA\Contact(
 *          email="dikep15@gmail.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */

class ArticleController extends Controller
{
    private ArticleRepositoryInterface $ArticleRepository;

    public function __construct(ArticleRepositoryInterface $ArticleRepository)
    {
        $this->ArticleRepository = $ArticleRepository;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/articles",
     *     summary="Find all the articles",
     *     description="Returns all the articles",
     *
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="articles not found"
     *     ),
     *     security={
     *         {"api_key": {}}
     *     }
     * )
     */

    public function index()
    {
        $relation = ['comments', 'likes', 'views'];

        $articles = $this->ArticleRepository->getAllWithRelation($relation);

        $collection = new ArticleCollection($articles);

        return $collection->preserveQuery();
    }

    /**
     * @OA\Get(
     *     path="//api/v1/articles/{id}",
     *     tags={"articles"},
     *     summary="Find articles by ID",
     *     description="Returns a single articles",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of articles to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="articles not found"
     *     ),
     *     security={
     *         {"api_key": {}}
     *     }
     * )
     *
     * @param  $id
     */

    public function show(Article $id)
    {
        $articles = $this->ArticleRepository->findArticle($id);

        return new ArticleCollection($articles);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/articles/{id}/comment",
     *     tags={"articles"},
     *     summary="Find articles by ID with their comments",
     *     description="Returns a single articles with comments",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of articles to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="articles not found"
     *     ),
     *     security={
     *         {"api_key": {}}
     *     }
     * )
     *
     * @param $id
     */

    public function getArticleComments($id)
    {
        $relation = 'comments';

        $articles = $this->ArticleRepository->FindRelationWithId($id, $relation);

        return new ArticleCollection($articles);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/articles/{id}/like",
     *     tags={"articles"},
     *     summary="Find articles by ID with their likes",
     *     description="Returns a single articles with likes",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of articles to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="articles not found"
     *     ),
     *     security={
     *         {"api_key": {}}
     *     }
     * )
     *
     * @param $id
     */

    public function getArticleLikes($id)
    {
        $relation = 'likes';

        $articles = $this->ArticleRepository->FindRelationWithId($id, $relation);

        return new ArticleCollection($articles);
    }
    /**
     * @OA\Get(
     *     path="/api/v1/articles/{id}/view",
     *     tags={"articles"},
     *     summary="Find articles by ID with their views",
     *     description="Returns a single articles with views",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of articles to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="articles not found"
     *     ),
     *     security={
     *         {"api_key": {}}
     *     }
     * )
     *
     * @param $id
     */


    public function getArticleViews($id)
    {
        $relation = 'views';

        $articles = $this->ArticleRepository->FindRelationWithId($id, $relation);

        return new ArticleCollection($articles);
    }
}
