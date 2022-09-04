<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

use App\Http\Resources\PostResource;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        return PostResource::collection(Post::where('user_id', $user->id)->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Request $request)
    {
        $user = $request->user();
        if ($user->id !== $post->user_id) {
            return abort(403, 'Unauthorized action');
        }
        return new SurverResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Request $request)
    {
        $user = $request->user();
        if ($user->id !== $survey->user_id) {
            return abort(403, 'Unauthorized action');
        }
        $post->delete();
        return response('', 204);
    }

    public function clientIndex(Request $request)
    {
        return PostResource::collection(Post::paginate(10));
    }

    public function clientShow(Post $post, Request $request) 
    {
        return new PostResource($post);
    }
}
