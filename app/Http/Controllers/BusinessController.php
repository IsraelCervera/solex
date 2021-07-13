<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\Http\Requests\Business\StoreRequest;
use App\Http\Requests\Business\UpdateRequest;

class BusinessController extends Controller
{
    function __construct()
    {
       $this->middleware('auth', ['except' => ['create', 'store']]);
       $this->middleware('soloadmin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $businesses = Business::all();
        return view('admin.business.index', compact('businesses'));
    }


    public function create()
    {
        return view('admin.business.create');
    }


    public function store(StoreRequest $request)
    {

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("business"),$image_name);
        }
        $business = Business::create($request->all()+[
            'logo'=>$image_name,
        ]);

        return redirect()->route('businesses.index');
    }


    public function show(Business $business)
    {
        //$business = Business::findOrFail($business);
        return view('admin.business.show', compact('business'));
    }


    public function edit(Business $business)
    {
        return view('admin.business.edit', compact('business'));
    }


    public function update(UpdateRequest $request, Business $business)
    {
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("business"),$image_name);
        }
        $business->update($request->all()+[
            'logo'=>$image_name,
        ]);

        return redirect()->route('admin.business.index');
}


    public function destroy(Business $business)
    {
        $business->delete();
        return redirect()->route('businesses.index');
    }
}
