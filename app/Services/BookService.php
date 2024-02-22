<?php

namespace App\Services;

use App\Traits\NeedExternalServies;

class BookService{

    use NeedExternalServies;

    protected $base_uri;
    protected $secret;

    public function __construct() {
        $this->base_uri = config('services.book.baseUrl');
        $this->secret = config('services.book.secret');
    }

    public function getBooks(){
        return $this->makeRequest('GET', '/books');
    }

    public function showBook($id){
        return $this->makeRequest('GET', "/book/$id");
    }

    public function storeBook($data){
        return $this->makeRequest('POST', '/book', $data);
    }

    public function updateBook($id, $data){
        return $this->makeRequest('PUT', "/book/$id", $data);
    }

    public function deleteBook($id){
        return $this->makeRequest('DELETE', "/book/$id");
    }

}