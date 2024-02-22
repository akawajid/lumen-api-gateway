<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use App\Models\Book;
use Illuminate\Http\Request; 
use Illuminate\Http\Response; 

class BookController extends Controller{

    use ApiResponse;

    public function __construct(){
    }

    function index(){
        $books = Book::all();
        return $this->success($books);
    }

    function show($id){
        $book = Book::findOrFail($id);
        return $this->success($book);
    }

    function store(Request $request){
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'author_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        $book = Book::create($request->all());
        return $this->success($book, Response::HTTP_CREATED);
    }

    function update(Request $request, $id){
        $rules = [
            'title' => 'max:255',
            'description' => 'max:255',
            'price' => 'numeric',
            'author_id' => 'integer',
        ];

        $this->validate($request, $rules);

        $book = Book::findOrFail($id);
        $book->fill($request->all());

        if($book->isClean()){
            return $this->error('Nothing to update', Response::HTTP_PRECONDITION_FAILED);
        }

        $book->save();
        return $this->success($book);
    }

    function delete($id){
        $book = Book::findOrFail($id);
        $book->delete();

        return $this->success('Deleted successfully');
    }

}
