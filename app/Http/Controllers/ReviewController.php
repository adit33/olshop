<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
class ReviewController extends Controller
{
	public function __construct(Review $review){
		$this->review=$review;
	}

    public function store(Request $request){
    	$review=new Review;
    	$this->review->addReview($review,$request);
    }

    public function getApiReview(){
    	$review=Review::paginate(5);
    	return response()->json($review);
    }
}
