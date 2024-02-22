<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request; 
use Illuminate\Http\Response; 

class BookController extends Controller{

    use ApiResponse;

    public $bookService;

    public function __construct(BookService $bookService){
        $this->bookService = $bookService;
    }

    function index(){
        return $this->success($this->bookService->getBooks());
    }

    function show($id){
        return $this->success($this->bookService->showBook($id));
    }

    function store(Request $request){
        return $this->success($this->bookService->storeBook($request->all()), Response::HTTP_CREATED);
    }

    function update(Request $request, $id){
        return $this->success($this->bookService->updateBook($id, $request->all()));
    }

    function delete($id){
        return $this->success($this->bookService->deleteBook($id));
    }

}
