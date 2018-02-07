<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
class ReviewController extends Controller
{
	public function __construct(Review $review){
		$this->review=$review;
	}

    public function store(Request $request){
    	$review=new Review;
    	return $this->review->addReview($review,$request);
    }

    public function getApiReview(Request $request){
    	// $review=Review::paginate(5);
        $review=Product::with('reviews.user')->find($request->id);
    	return response()->json($review->reviews()->paginate(10));
    }
}
