<?php

namespace App\Http\Controllers;

use App\Article;
use App\Subscription;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::all();
        $auth =  Auth::id();
        $users = User::all();
        $subscribes = Subscription::where('subscriber', '=', $auth)->get();
        return view('articles.articles',['article' => $article,'subscribes' => $subscribes,'users' => $users,'auth' => $auth]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $article = new Article([
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'user_id' => Auth::user()->id
        ]);
        $article->save();
        return redirect('article');
    }

    public function show($id)
    {
        $user =  Auth::id();
        $article = Article::find($id);
        $author = $article->user_id;
        $permissed = false;
        if($author == $user){
            $permissed = true;
        }
        $subscribe = false;
        $subscribes = Subscription::where('subscriber', '=', $user)->get();
        foreach ($subscribes as $key => $value){
            $authors = $value->author;
            if($author == $authors){
                $subscribe = true;
                continue;
            }
        }
        return view('articles.article',['article' => $article,'permissed' => $permissed,'subscribe' => $subscribe]);
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit',['article' => $article]);
    }

    public function update($id,Request $request)
    {
        $article= Article::findOrFail($id);
        $input = $request->all();
        $article->fill($input)->save();
        return redirect('article');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('article');
    }
}
