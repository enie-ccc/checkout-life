<?php
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_origins' => ['http://localhost:5173'], // твой фронт
    'allowed_methods' => ['*'], // все HTTP-методы
    'allowed_headers' => ['*'], // все заголовки
    'supports_credentials' => true, // для кук, сессий
];
