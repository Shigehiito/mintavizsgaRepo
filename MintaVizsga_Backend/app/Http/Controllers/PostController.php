<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        if($request->search){
            $post = DB::table('posts')
            ->where('title', 'like', '%' . $request->search . '%' )
            ->paginate(3);

        }
        else{
            $post = DB::table('posts')->paginate(3);
        }

        return view('post_index', ['post' => $post]);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('post_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request ->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        DB::table('posts')->insert([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect('/post');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = DB::table('posts')->where('id', $id)->first();
        return view('post_show' , ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = DB::table('posts')->where('id', $id)->first();

        return view('post_edit' , ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request ->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $affected = DB::table('posts')
        ->where('id' , $request->id)
        ->update(['title' => $request->title,
                  'body' => $request->body,
    ]);
    return redirect('/post/'. $request->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deleted = DB::table('posts')->where('id', $id)->delete();

        return redirect('/post');
    }
}
