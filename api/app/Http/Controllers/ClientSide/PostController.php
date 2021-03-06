<?php

namespace App\Http\Controllers\ClientSide;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Post\ShowResource;
use App\Http\Resources\Post\IndexResource;

class PostController extends Controller
{
    public PostService $postService;

    /**
     * __construct
     *
     * @param  mixed $postService
     * @return void
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * @OA\Get(
     *     path="/posts",
     *     operationId="postsUser",
     *     @OA\Parameter(
     *       name="limit",
     *       required=false,
     *       in="query",
     *       description="limit data",
     *       @OA\Schema(
     *         type="string"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="page",
     *       required=false,
     *       in="query",
     *       description="page number",
     *       @OA\Schema(
     *         type="string"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="key",
     *       required=false,
     *       in="query",
     *       description="HMAC_SHARED_API_KEY",
     *       @OA\Schema(
     *         type="string"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="data",
     *       required=false,
     *       in="query",
     *       description="BASE_64_ENCODE_DATA",
     *       @OA\Schema(
     *         type="string"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="signature",
     *       required=false,
     *       in="query",
     *       description="BASE_64_ENCODE_SIGNATURE",
     *       @OA\Schema(
     *         type="string"
     *       )
     *     ),
     *     tags={"ClientSide"},
     *     @OA\Response(response="200", description="Get information for posts")
     * )
     */
    public function index(Request $request)
    {
        return new IndexResource($this->postService->paginateWithOrder($request, Post::DATE, 'desc'));
    }

    /**
     * @OA\Get(
     *     path="/posts/{id}",
     *     operationId="singlePostUser",
     *     @OA\Parameter(
     *         description="ID of post",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *       name="key",
     *       required=false,
     *       in="query",
     *       description="HMAC_SHARED_API_KEY",
     *       @OA\Schema(
     *         type="string"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="data",
     *       required=false,
     *       in="query",
     *       description="BASE_64_ENCODE_DATA",
     *       @OA\Schema(
     *         type="string"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="signature",
     *       required=false,
     *       in="query",
     *       description="BASE_64_ENCODE_SIGNATURE",
     *       @OA\Schema(
     *         type="string"
     *       )
     *     ),
     *     tags={"ClientSide"},
     *     @OA\Response(response="200", description="Get information for single post")
     * )
     */
    public function show(int $id)
    {
        return new ShowResource($this->postService->find($id));
    }

    /**
     * @OA\Get(
     *     path="/posts/uuid/{uuid}",
     *     operationId="singlePostByUUidUser",
     *     @OA\Parameter(
     *         description="uuid of post",
     *         in="path",
     *         name="uuid",
     *         required=true,
     *         @OA\Schema(
     *           type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *       name="key",
     *       required=false,
     *       in="query",
     *       description="HMAC_SHARED_API_KEY",
     *       @OA\Schema(
     *         type="string"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="data",
     *       required=false,
     *       in="query",
     *       description="BASE_64_ENCODE_DATA",
     *       @OA\Schema(
     *         type="string"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="signature",
     *       required=false,
     *       in="query",
     *       description="BASE_64_ENCODE_SIGNATURE",
     *       @OA\Schema(
     *         type="string"
     *       )
     *     ),
     *     tags={"ClientSide"},
     *     @OA\Response(response="200", description="Get information for posts")
     * )
     */
    public function showByUuid(string $id)
    {
        return new ShowResource($this->postService->showByUid($id));
    }
}
