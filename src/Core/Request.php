<?php
namespace App\Core;

class Request
{
    public function getUri()
    {
        // returns url path (e.g., /customers) 
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
    public function getMethod()
    {
        // returns request method (GET, POST, PUT, DELETE, etc.)
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getBody()
    {
        $data = [];

        if ($this->getMethod() === 'GET') {
            foreach ($_GET as $key => $value) {
                // Sanitize input to prevent basic XSS
                $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->getMethod() === 'POST') {
            foreach ($_POST as $key => $value) {
                // Sanitize input to prevent basic XSS
                $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $data;
    }
}