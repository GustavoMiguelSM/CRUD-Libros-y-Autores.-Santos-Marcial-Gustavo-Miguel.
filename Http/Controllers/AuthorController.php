<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Exception;

class AuthorController extends Controller{

    public function index(Request $request){
        try{
            $author = Author::all();
            } catch (Exception $e){
            return response()->json(('message' -> $e -> getMessage()),500);
        }
    }

    public function show($id){
        try{
            $author = Author::find($id);
            
        } catch (Exception $e) {
            return response()->json(('message' -> $e -> getMessage()),500);
        }
    }

    public function store(){
        try{
            $author = new Author();
            $author->name = Input::get('name');
            $author->last_name = Input::get('last_name');
            $author->country = Input::get('country');
            $author->save();

        } catch (Exception $e) {
            return response()->json(('message' -> $e -> getMessage()),500);
        }        
    }

}