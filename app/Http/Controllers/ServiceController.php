<?php

namespace App\Http\Controllers;

use DB;
use App\Service;
use App\ShoppingCart;
use App\Category;
use App\User;
use App\Comment;
use App\Provider;
use App\Http\Requests\Service\StoreRequest;
use App\Http\Requests\Service\UpdateRequest;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ServiceController extends Controller
{
    function __construct()
    {
       $this->middleware('auth', ['except' => ['show']]);
       $this->middleware('soloadmin', ['except' => ['show']]);
    }
    
    public function index()
    {
        //$services = Service::get();
        $comments = DB::table('comments')->select('comments.*')->orderBy('id', 'desc')->get();
        $users = DB::table('users')->select('users.*')->orderBy('id', 'desc')->get();
        $services = Service::orderBy('id', 'desc')->paginate(30);
        return view('admin.service.index', compact('services'));
    }


    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.service.create', compact('categories', 'providers'));
    }


    public function store(StoreRequest $request)
    {

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/service"),$image_name);
        }
        $service = Service::create($request->all()+[
            'image'=>$image_name,
        ]);
        if ($request->code == "") {
            $numero = $service->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $service->update(['code'=>$numeroConCeros]);
        }

        return redirect()->route('services.index');
    }


    public function show(Service $service)
    {
        //$service = Service::findOrFail($service);
        return view('admin.service.show', compact('service'));
    }


    public function edit(Service $service)
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.service.edit', compact('service', 'categories', 'providers'));
    }


    public function update(UpdateRequest $request, Service $service)
    {
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/service"),$image_name);
        }
        $service->update($request->all()+[
            'image'=>$image_name,
        ]);
        if ($request->code == "") {
            $numero = $service->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $service->update(['code'=>$numeroConCeros]);

        return redirect()->route('admin.service.index');
    }
}


    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index');
    }

    public function change_status(Service $service)
    {
        if ($service->status == 'ACTIVE') {
            $service->update(['status'=>'DESACTIVED']);
            return redirect()->back();
        } else {
            $service->update(['status'=>'ACTIVE']);
            return redirect()->back();
        } 
    }

    public function get_services_by_barcode(Request $request){
        if ($request->ajax()) {
            $services = Service::where('code', $request->code)->firstOrFail();
            return response()->json($services);
        }
    }
    public function get_services_by_id(Request $request){
        if ($request->ajax()) {
            $services = Service::findOrFail($request->product_id);
            return response()->json($services);
        }
    }

    
    public function print_barcode()
    {
        $services = Service::get();
        $pdf = PDF::loadView('admin.service.barcode', compact('services'));
        return $pdf->download('codigos_de_barras.pdf');
    }
}
