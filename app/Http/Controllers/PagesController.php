<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Product;
use App\Service;
use App\User;
use App\Comment;
use App\Business;
use App\Post;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{

    public function home(){

        $posts = Post::orderBy('id', 'desc')->paginate(6);
        $business = Business::where('id', 1)->firstOrFail();

        $comments = DB::table('comments')->select('comments.*')->orderBy('id', 'desc')->get();
        $users = DB::table('users')->select('users.*')->orderBy('id', 'desc')->get();
        $products = Product::orderBy('id', 'desc')->paginate(6);
        $services = Service::orderBy('id', 'desc')->paginate(6);
        return view('home', array(
            'products' => $products,
            'services' => $services,
            'users' => $users,
            'posts' => $posts,
            'business' => $business
        ));


    	return view ('home');
    }

    public function index()
    {
        $business = Business::where('id', 1)->firstOrFail();
        $comments = DB::table('comments')->select('comments.*')->orderBy('id', 'desc')->get();
    	$users = DB::table('users')->select('users.*')->orderBy('id', 'desc')->get();
    	$products = Product::orderBy('id', 'desc')->paginate(30);
        $services = Service::orderBy('id', 'desc')->paginate(30);
    	return view('home', array(
    		'products' => $products,
            'services' => $services,
    		'users' => $users,
            'business' => $business
    	));
    }

}