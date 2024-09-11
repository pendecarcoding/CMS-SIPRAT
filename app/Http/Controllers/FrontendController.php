<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TomatoPHP\FilamentCms\Models\Post;

class FrontendController extends Controller
{
    public const ACTIVE = '1';
    public function index(){
        app()->setLocale('ar');
        
        // Fetch the posts where 'is_publish' is 1
        $posts = Post::where('is_published', self::ACTIVE)
                     ->orderby('id', 'desc')
                     ->get()
                     ->map(function($post) {
                        $post->translated_title = $post->title ?? 'Title not available';
                        return $post;
                     });

        // Pass the $posts data to the view
        return view('frontend.index', compact('posts'));
        
    }

    public function detailpage($page){
        return view('frontend.page.detailpage');
    }
}
