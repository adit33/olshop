<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Discussion;

class DiscussionController extends Controller
{
    public function __construct(Discussion $discussion){
    	$this->discussion = $discussion;
    }

    public function store(Request $request){
    	$discussion = new Discussion;
    	return $this->discussion->addDiscussion($discussion,$request);
    }

    public function getApiDiscussion(Request $request){
    	// $review=Review::paginate(5);
        $review=Product::with('discussion.user')->find($request->id);
    	return response()->json($review->discussion()->paginate(10));
    }
}
