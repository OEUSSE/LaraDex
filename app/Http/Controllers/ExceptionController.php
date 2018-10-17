<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;

class ExceptionController extends Controller
{
    public function index()
    {
        throw new \LaraDex\Exceptions\CustomException('Something Went Wrong.');
    }
}
