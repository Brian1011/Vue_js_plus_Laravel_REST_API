<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //all records
    public function index(){
        //perform pagination
        $articles = Article::orderBy('created_at','desc')->paginate(5);

        //return data that is paginated
        return $articles;
    }

    //single record
    public function show($id){
        return Article::find($id);
    }

    //get all the inputs and send them to db
    public function store(Request $request){
        $article = Article::create($request->all());
        //return JSON data
        //201 Object created. Useful for the store actions.
        return response()->json($article, 201);
    }

    //update data based on the data recieved
    public function update(Request $request, $id){
        //findOrfail takes an id and returns a single model. If no matching model exist, it throws an error1.
        $article = Article::findOrFail($id);
        $article->update($request->all());
        //200 OK. The standard success code and default option.
        return response()->json($article, 200);
    }

    //delete data
    public function delete(Request $request, $id){
        $article = Article::findOrFail($id);
        $article->delete();

        //204 No content. When an action was executed successfully, but there is no content to return.
        return response()->json(null,204);
    }


}
