<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
      $data = $request->all();

      $new_message = new Message();
      $new_message->fill($data);
      $new_message->save();
    }
}
