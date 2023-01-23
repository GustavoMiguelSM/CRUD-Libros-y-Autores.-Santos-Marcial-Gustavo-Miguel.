<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Exception;

class BooksController extends Controller{

    public function index(Request $request){
        try{
        $books = Book::select()->HasReleaseDate($request->release_date)
        ->ordenBy()->groupBy();
        
            return response()-> json($books);
        } catch (Exception $e){
            return response()->json(('message' -> $e -> getMessage()),500);
        }
    }

    public function show($id){
        try{
            $books = Book::find($id);
            
        } catch (Exception $e) {
            return response()->json(('message' -> $e -> getMessage()),500);
        }
    }

    public function store(){
        try{
            $books = new Book();
            $books->title = Input::get('title');
            $books->author = Input::get('author');
            $books->release_year = Input::get('release_year');
            $books->isbn = Input::get('isbn');
            $books->active = true;
            $books->save();

        } catch (Exception $e) {
            return response()->json(('message' -> $e -> getMessage()),500);
        }        
    }

    public function update() {
        try{
            $books = Book::find($id);
            $books->title = Input::get('title');
            $books->author = Input::get('author');
            $books->release_year = Input::get('release_year');
            $books->isbn = Input::get('isbn');
            $books->save();
        } catch (Exception $e) {
            return response()->json(('message' -> $e -> getMessage()),500);
        }
    }

    public function destroy(){
        try{
            $books = Book::find($id);
            $books->delete();
        } catch (Exception $e) {
            return response()->json(('message' -> $e -> getMessage()),500);
        }
    }
}