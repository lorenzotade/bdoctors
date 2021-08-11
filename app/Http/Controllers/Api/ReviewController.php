<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
      $data = $request->all();

      $new_review = new Review();
      $new_review->fill($data);
      $new_review->save();
    }
}
