<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Service;
use App\PaymentPlatform;
use App\Post;
use App\Business;

class WebController extends Controller
{
    
    public function checkout(){
    	$paymentPlatforms = PaymentPlatform::all();
    	return view('web.checkout', compact('paymentPlatforms'));
    }

    public function orders(){
    	$orders = auth()->user()->orders;
    	return view('web.orders', compact('orders'));
    }

        public function service(){
        $services = Service::all();
        $business = Business::where('id', 1)->firstOrFail();
        return view('web.service.service', compact('services', 'business'));
    }

    public function service_details(Service $service){
        $business = Business::where('id', 1)->firstOrFail();
        $services = Service::orderBy('id', 'desc')->paginate(3);
        return view('web.service.service_detail', compact('service', 'services', 'business'));
    }

    public function product(){
        $products = Product::all();
        $business = Business::where('id', 1)->firstOrFail();
        return view('web.product.product', compact('products', 'business'));
    }

    public function product_details(Product $product){
        $business = Business::where('id', 1)->firstOrFail();
        $products = Product::orderBy('id', 'desc')->paginate(3);
        return view('web.product.product_detail', compact('product', 'products', 'business'));
    }

    public function contact_us(){
        $business = Business::where('id', 1)->firstOrFail();
        return view('web.business.contact_us', compact('business'));
    }

    public function about_us(){
        $business = Business::where('id', 1)->firstOrFail();
        return view('web.business.about_us', compact('business'));
    }

    public function blog(){
        $business = Business::where('id', 1)->firstOrFail();
        $posts = Post::all();
        return view('web.blog.blog', compact('posts', 'business'));
    }

    public function blog_details(Post $post){
        $posts = Post::orderBy('id', 'desc')->paginate(3);
        $business = Business::where('id', 1)->firstOrFail();
        return view('web.blog.blog_detail', compact('post', 'posts', 'business'));
    }

    public function welcome(){
    	return view('welcome');
    }

}
