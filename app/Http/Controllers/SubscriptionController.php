<?php
namespace App\Http\Controllers;

use App\Article;
use App\Subscription;
use Auth;


class SubscriptionController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $article =[];
        $subscribe= Subscription::where('subscriber', '=', $id)->get();
        foreach ($subscribe as $key => $value) {
            $author = $value->author;
            $article[] = Article::where('user_id', '=', $author)->get();
        }
        return view('articles.tape',['article' => $article]);
    }

    public function update($id)
    {
        $subscription = new Subscription([
            'author' => Article::find($id)->user_id ,
            'subscriber' => Auth::user()->id
        ]);
        $subscription->save();
        return redirect('article');
    }

    public function destroy($id)
    {
        $subscripe= Subscription::where('author', '=', $id);
        $subscripe->delete();
        return redirect('article');
    }
}
