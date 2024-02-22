<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use App\Services\AuthorService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorController extends Controller{

    use ApiResponse;

    protected $authorService;

    public function __construct(AuthorService $authorService){
        $this->authorService = $authorService;
    }

    function index(){
        return $this->success($this->authorService->getAuthors());
    }

    function show($id){
        return $this->success($this->authorService->showAuthor($id));
    }

    function store(Request $request){
        return $this->success($this->authorService->storeAuthor($request->all()), Response::HTTP_CREATED);
    }

    function update(Request $request, $id){
        return $this->success($this->authorService->updateAuthor($id, $request->all()));
    }

    function delete($id){
        return $this->success($this->authorService->deleteAuthor($id));
    }

}
