<?php
namespace App\Repositories;

class JsonResponse
{
    private $data = [];
    private $success = false;
    private $errors = [];
    private $status = 0;
    private $url = 0;
    private $message = null;

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setSuccess($success)
    {
        $this->success = $success;
    }

    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setNextUrl($url)
    {
        $this->url = $url;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getResponse()
    {
        $resp = [
          'data' => $this->data,
          'success' => $this->success,
          'errors' => $this->errors,
          'status' => $this->status,
          'url' => $this->url,
          'message' => $this->message
        ];

        return $resp;
    }
}