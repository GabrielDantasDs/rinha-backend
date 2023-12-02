<?php

namespace http;

class Response {
    protected $content;
    protected $status;
    protected $headers;

    public function __construct($content = '', $status = 200, $headers = ["Content-Type: application/json"]) {
        $this->content = $content;
        $this->status = $status;
        $this->headers = $headers;
    }

    public function json() {

        //to do
        header($this->headers[0]);

        http_response_code($this->status);

        if ($this->isJson($this->content)) echo $this->content;

        echo json_encode($this->content);
    }

    private function isJson($string) {
        return json_last_error() === JSON_ERROR_NONE;
     }
     
}