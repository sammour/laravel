<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Auth;

class ArticleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index () {
        $articles = Article::all();
        return view('listedesarticles', [
            'articles' => $articles
        ]);
    }

    public function add () {

        $categoriesObj = Category::all();
        $categoriesArr = array();
        foreach ($categoriesObj as $categoryObj){
            $categoriesArr = array_add($categoriesArr, $categoryObj->id, $categoryObj->name);
        }

        $tags = Tag::all();
        $tagArr = array();
        foreach ($tags as $tag){
            $tagArr = array_add($tagArr, $tag->id, $tag->name);
        }
        return view('addarticle', [
            'categories' => $categoriesArr,
            'tags' => $tagArr
        ]);
    }

    /**
     * @param Request $request
     */
    public function store (Request $request) {
        $user = Auth::user();
        if ($article = Article::create([
            'title'           => $request->title,
            'excrept'         => $request->excrept,
            'content'         => $request->content,
            'categories_id'   => $request->categories_id,
            'user_id'         => $user->id,
        ])) {
            $article->tags()->sync($request->tags);
            echo 'sucess!!';
            return redirect()->route('ArticlesIndex');
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit ($id) {
        $article = Article::findOrFail($id);

        $categoriesObj = Category::all();
        $categoriesArr = array();
        foreach ($categoriesObj as $categoryObj){
            $categoriesArr = array_add($categoriesArr, $categoryObj->id, $categoryObj->name);
        }

        $tags = Tag::all();
        $tagArr = array();
        foreach ($tags as $tag){
            $tagArr = array_add($tagArr, $tag->id, $tag->name);
        }

        return view('editarticle', [ 'article' => $article, 'categories' => $categoriesArr, 'tags' => $tagArr]);
    }

    /**
     * @param Request $request
     * @param int $id
     */
    public function update (Request $request, int $id) {
        $article = Article::findOrFail($id);
        $category = Category::findOrFail($request->categories_id);
        $article->setAttribute('title', $request->title);
        $article->setAttribute('excrept', $request->excrept);
        $article->setAttribute('content', $request->content);
        $article->setAttribute('slug', $request->slug);
        $user = Auth::user();
        $article->setAttribute('user_id', $user->id);
        $article->category()->associate($category);
        $article->tags()->sync($request->tags);
        //$article->save();
        //$category->articles->save($article);


        if($article->save()) {
            echo 'ok';
            return redirect()->route('ArticlesIndex');
        }
    }

    public function show(int $id) {
        $article = Article::findOrFail($id);
        return view('show', [
            'article' => $article
        ]);
    }

    public function delete(int $id) {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('ArticlesIndex');
    }
}
