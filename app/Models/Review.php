<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\User;
class Review extends Model
{
    protected $table="review";
    protected $primaryKey="id";
    protected $fillable=['id','description','rating','email','product_id'];

    public function addReview($review,$request){
        $review->description =$request->input('description');
        $review->rating      =$request->input('rating');
        $review->product_id  =$request->input('product_id');
        $review->email       =Auth::user()->email;
        $review->save();

        return Review::with('user')->find($review->id);
    }


    public function user(){
        return $this->belongsTo(User::class,'email','email');
    }
}
