<?php

namespace App\Http\Controllers;

use DB;
use App\Comment;
use App\User;
use App\Product;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = DB::table('comments')->get();
        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'body' => 'required',
        ],
        [
            'body.required' => 'El comentario esta vacio',
        ]);

         $user = \Auth::user();
         DB::table('comments')->insert([
            'user_id' => $user->id,
            'product_id' => $request['product_id'],
            'body' => $request['body'],
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
         ]);

        return redirect()->back()->with(array('message' => 'Comentario añadido con exito'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comment::findOrFail($id);
        return view('comments.show', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comments = Comment::FindOrFail($id);
        return view('comments.edit', compact('comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'body' => 'required',
        ],
        [
            'body.required' => 'El comentario es requerido',
        ]);

        Comment::findOrFail($id)->update($request->all());
        $comment = Comment::findOrFail($id);

        return redirect()->route('products.show', $comment->product_id)->with(array('message' => 'Comentario actualizado con exito'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \Auth::user();
        $comment = Comment::findOrFail($id);

        if($user && ($comment->user_id == $user->id || $comment->product->user_id ==$user->id)){
            Comment::findOrFail($id)->delete();
        }else{
            $comment = Comment::findOrFail($id);
            Comment::findOrFail($id)->delete();
        }

        return redirect()->back()->with(array('message' => 'Comentario eliminado con exito'));
    }
}
