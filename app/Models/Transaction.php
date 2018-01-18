<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Cart,Mail,Auth;

use App\Mail\Order;

use App\Models\DetailTransaction;

class Transaction extends Model
{
    protected $table='transaction';
    protected $primaryKey='id';
    protected $fillable=['id','email','total','total','service','code','ongkir','city_name','province','type','alamat'];

    public function checkout($request){
    	

    	$destination=$request->input('destination');
    	$ongkir=$request->input('ongkir');
        $service=$request->input('service');
        $code=$request->input('code');
    	$transaction=Transaction::create([
            'city_name' =>$destination['city_name'],
            'email'     =>Auth::user()->email,
            'province'  =>$destination['province'],
            'type'      =>$destination['type'],
            'alamat'    =>$destination['alamat'],
            'ongkir'    =>$ongkir,
            'service'   =>$service,
            'code'      =>$code,
            'total'     =>floatval(Cart::subtotal('0','','')),
    	]);

    	$detail_transaction=new DetailTransaction;
    	$detail_transaction->addDetailTransaction($transaction);
        $this->sendPaymentInformation($transaction);
    	Cart::destroy();
    	
    }

    public function product(){

    }

    public function detailTransaction(){
        return $this->hasMany(DetailTransaction::class,'transaction_id','id');
    }

    public function reportTransactionMonthly($request){
        $sum=[];
        for ($i=1; $i < 13; $i++) { 
            array_push($sum, Transaction::whereMonth('created_at',$i)
                ->whereYear('created_at',$request->input('year'))
                ->sum('total'));    
        }
        return $sum;
    }

    public function reportTransactionYearly(){

    }


    public function sendPaymentInformation($transaction){
         Mail::to($transaction->email)
        ->send(new \App\Mail\Order($transaction));
    }    

}
