<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use App\ShoppingCart;
use App\Category;
use App\User;
use App\Comment;
use App\Provider;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ProductController extends Controller
{

    function __construct()
    {
       $this->middleware('auth', ['except' => ['show']]);
       $this->middleware('soloadmin', ['except' => ['show']]);
    }
    
    public function index()
    {
        //$products = Product::get();
        $comments = DB::table('comments')->select('comments.*')->orderBy('id', 'desc')->get();
        $users = DB::table('users')->select('users.*')->orderBy('id', 'desc')->get();
        $products = Product::orderBy('id', 'desc')->paginate(30);
        return view('admin.product.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.create', compact('categories', 'providers'));
    }


    public function store(StoreRequest $request)
    {

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }
        $product = Product::create($request->all()+[
            'image'=>$image_name,
        ]);
        if ($request->code == "") {
            $numero = $product->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $product->update(['code'=>$numeroConCeros]);
        }

        return redirect()->route('products.index');
    }


    public function show(Product $product)
    {
        //$product = Product::findOrFail($product);
        return view('admin.product.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.edit', compact('product', 'categories', 'providers'));
    }


    public function update(UpdateRequest $request, Product $product)
    {
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }
        $product->update($request->all()+[
            'image'=>$image_name,
        ]);
        if ($request->code == "") {
            $numero = $product->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $product->update(['code'=>$numeroConCeros]);

        return redirect()->route('admin.product.index');
    }
}


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function change_status(Product $product)
    {
        if ($product->status == 'ACTIVE') {
            $product->update(['status'=>'DESACTIVED']);
            return redirect()->back();
        } else {
            $product->update(['status'=>'ACTIVE']);
            return redirect()->back();
        } 
    }

    public function get_products_by_barcode(Request $request){
        if ($request->ajax()) {
            $products = Product::where('code', $request->code)->firstOrFail();
            return response()->json($products);
        }
    }
    public function get_products_by_id(Request $request){
        if ($request->ajax()) {
            $products = Product::findOrFail($request->product_id);
            return response()->json($products);
        }
    }

    
    public function print_barcode()
    {
        $products = Product::get();
        $pdf = PDF::loadView('admin.product.barcode', compact('products'));
        return $pdf->download('codigos_de_barras.pdf');
    }
}
