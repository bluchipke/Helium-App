<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use App\Http\Resources\Post as PostResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Okami101\LaravelAdmin\Filters\SearchFilter;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PostResource::collection(
            QueryBuilder::for(Post::class)
                ->allowedFilters([
                    AllowedFilter::custom('q', new SearchFilter(['title', 'author', 'commentable', 'archived'])),
                    AllowedFilter::exact('id'),
                    AllowedFilter::partial('title'),
                    AllowedFilter::exact('category'),
                    AllowedFilter::exact('author'),
                    AllowedFilter::exact('commentable'),
                ])
                ->allowedSorts(['title', 'author', 'post_date'])
                ->allowedIncludes(['category', 'user'])
                ->exportOrPaginate()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return PostResource
     */
    public function show(Post $post)
    {
        return new PostResource($post->load(['category', 'user']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PostResource
     */
    public function store(StorePost $request)
    {
        $post = Post::create($request->all());

        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return PostResource
     */
    public function update(UpdatePost $request, Post $post)
    {
        $post->update($request->all());

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->noContent();
    }
}
