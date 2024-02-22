<?php 

return [
    'author' => [
        'baseUrl' => env('AUTHOR_SERVICE_BASE_URL'),
        'secret' => env('AUTHOR_SERVICE_SECRET_KEY')
    ],
    'book' => [
        'baseUrl' => env('BOOK_SERVICE_BASE_URL'),
        'secret' => env('BOOK_SERVICE_SECRET_KEY')
    ]
];