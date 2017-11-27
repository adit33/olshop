<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Cart;

use App\Models\DetailTransaction;

class Transaction extends Model
{
    protected $table='transaction';
    protected $primaryKey='id';
    protected $fillable=['id','email','total','total','ongkir','city_name','province','type','alamat'];

    public function checkout($request){
    	

    	$destination=$request->input('destination');
    	$ongkir=$request->input('ongkir');
    	$transaction=Transaction::create([
			'city_name' =>$destination['city_name'],
			'province'  =>$destination['province'],
			'type'      =>$destination['type'],
			'alamat'    =>$destination['alamat'],
			'ongkir'	=>$ongkir,
			'total'		=>floatval(Cart::subtotal('0','','')),
    	]);

    	$detail_transaction=new DetailTransaction;
    	$detail_transaction->addDetailTransaction($transaction);

    	Cart::destroy();
    	
    }

    public function product(){

    }

    public function detailTransaction(){
        return $this->hasMany(DetailTransaction::class,'transaction_id','id');
    }


    

}
