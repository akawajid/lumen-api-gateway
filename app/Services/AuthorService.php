<?php

namespace App\Services;

use App\Traits\NeedExternalServies;

class AuthorService{

    use NeedExternalServies;

    protected $base_uri;
    protected $secret;

    public function __construct() {
        $this->base_uri = config('services.author.baseUrl');
        $this->secret = config('services.author.secret');
    }

    public function getAuthors(){
        return $this->makeRequest('GET', '/authors');
    }

    public function showAuthor($id){
        return $this->makeRequest('GET', "/author/$id");
    }

    public function storeAuthor($data){
        return $this->makeRequest('POST', '/author', $data);
    }

    public function updateAuthor($id, $data){
        return $this->makeRequest('PUT', "/author/$id", $data);
    }

    public function deleteAuthor($id){
        return $this->makeRequest('DELETE', "/author/$id");
    }

}