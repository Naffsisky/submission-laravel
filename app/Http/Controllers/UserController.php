<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class UserController extends Controller
{
    public function index(){
        $articles = Article::all();
        $categories = Category::all();

        return view('user.blog', compact('articles', 'categories'));
    }

    public function about(){
        return view('user.about');
    }

    public function view($id) {
        $article = Article::findOrFail($id);

        return view('user.view', compact('article'));
    }
}
