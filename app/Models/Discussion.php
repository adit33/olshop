<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Discussion extends Model
{
    protected $table='discussion';
    protected $primaryKey='id';
    protected $fillable=['id','email','message','product_id','parent_id'];

    public function addDiscussion($discussion,$request){
		$discussion->email      =Auth::user()->email;
		$discussion->product_id =$request->input('product_id');
		$discussion->message    =$request->input('message');
		$discussion->parent_id  =$request->input('parent_id');
		$discussion->save();
    }

    public function user(){
        return $this->belongsTo(User::class,'email','email');
    }
    
}
