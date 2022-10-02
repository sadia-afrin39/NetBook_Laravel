<?php

namespace App\Http\Controllers;

use App\Models\NetBook;
use Illuminate\Http\Request;

class MyHomeController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

     public function index(){
         $articles = NetBook::all();
         //dd($articles);
        return view('pages.index', compact('articles'));
     }

     public function contacts(){
        return view('pages.contacts');
     }

     public function createnote(){
        return view('pages.createnote');
     }

     public function store(Request $request ){
        $request ->validate([
         'article'=>'required|max:255',
         'source'=>'required|max:255',
         'description'=>'required'
        ]);
      NetBook::create($request->all());
      return redirect(route('index'))->with('message','Article created successfully.');
     }

     public function updatenote($id){
      $article = NetBook::where('id',$id)->get();
      //dd($article);
      return view('pages.update', compact('article'));
    }

    public function update(Request $request, NetBook $netBook){
      $request ->validate([
          'article' => 'required|max:255',
          'source' => 'required|max:255',
          'description' => 'required'
      ]);
      $netBook->update($request ->all());
       return redirect(route('index'))->with('message', 'Article updated successfully.');
   }

     public function delete(NetBook $netBook){
      $netBook->delete();
      return redirect(route('index'))->with('message','Article deleted successfully.');
    }

     public function profile(){
        return view('pages.profile');
     }
}
