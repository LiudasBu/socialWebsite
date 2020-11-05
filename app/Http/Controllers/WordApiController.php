<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WordApiController extends Controller
{
    public function index($query)
    {
        $response = Http::get("https://api.dictionaryapi.dev/api/v2/entries/en/{$query}")['0']['meanings']['0']['definitions']['0']['definition'];

        return $response;
    }
}
