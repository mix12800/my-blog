<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function articleUser($user) {
        return Article::where('user_id', $user)->with('user')->first();
    }
    public function articleOne($article)
    {
        return Article::where('id', $article)->with("user")->first();
    }
    public function article()
    {
        return Article::with("user")->get();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Article::with("user")->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->user_id = Auth::id();
        $article->save();
        return response()->json($article, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($article)
    {
        return Article::where('id', $article)->with("user")->first();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();
        return response()->json($article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json(['massage' => 'Удалено']);
    }
}
