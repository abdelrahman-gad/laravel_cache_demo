<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //          key , value , expiry_time 
        // Cache::put('user','gad',now()->addMinute());
        // 
       //    Cache::forever('key','value');

        // Cache::forget('key');// clear specific cache by its key 
        // Cache::flush();//clear all cache 
        // Cache::has('key');// check if there is a cache with this name 
        // Cache::increment('key','numeric value ');
        // Cache::decrement('key','numeric value ');
        
     
        Event::dispatch(new PostCreated());

        $posts = cache('posts', function () {
            dd(1);
            return Post::get();
        });

        // fetch posts without cache 
        // $posts = Post::all();
       return  $posts;

      //  $test  = Cache::get('user');
      // dd($test);
    }


    public function test(){
        $test  = Cache::get('user');
        dd($test); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
