<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use App\Models\Author;
use Illuminate\Http\Request; 
use Illuminate\Http\Response; 

class AuthorController extends Controller{

    use ApiResponse;

    public function __construct(){
    }

    function index(){
        $authors = Author::all();
        return $this->success($authors);
    }

    function show($id){
        $author = Author::findOrFail($id);
        return $this->success($author);
    }

    function store(Request $request){
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255',
        ];

        $this->validate($request, $rules);

        $author = Author::create($request->all());
        return $this->success($author, Response::HTTP_CREATED);
    }

    function update(Request $request, $id){
        $rules = [
            'name' => 'max:255',
            'gender' => 'max:255,in:male,female',
            'country' => 'max:255',
        ];

        $this->validate($request, $rules);

        $author = Author::findOrFail($id);
        $author->fill($request->all());

        if($author->isClean()){
            return $this->error('Nothing to update', Response::HTTP_PRECONDITION_FAILED);
        }

        $author->save();
        return $this->success($author);
    }

    function delete($id){
        $author = Author::findOrFail($id);
        $author->delete();

        return $this->success('Deleted successfully');
    }

}
