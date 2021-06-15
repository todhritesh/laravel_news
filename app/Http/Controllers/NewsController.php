<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\news;

class NewsController extends Controller
{
    public function home(){
        $data = news::all();

        return view("home",['news'=>$data]);
    }

    public function publishNews(Request $req){

        $req->validate([
            'title' => 'required',
            'category' => 'required',
            'author' => 'required',
            'news' => 'required'
        ]);


        $n = new news();

        $n->title = $req->input('title');
        $n->category = $req->input('category');
        $n->author = $req->author;
        $n->post = $req->news;

        $n->save();

        return redirect('/');
    }

    public function delete($id){
        news::find($id)->delete();
        return redirect('/');
    }


}
