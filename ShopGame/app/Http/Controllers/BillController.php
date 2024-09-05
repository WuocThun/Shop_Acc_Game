<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nick;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Collection;
class BillController extends Controller
{
    public function getNick( $ms){
        if (isset(Auth::user()->id)){
            $nick = Nick::where('ms',$ms)->first();
            session(['countMoney'=>number_format($nick['price'],0,',','.')]);
            $bill = new Bill();
            $bill->customer_id	= Auth::user()->id;
            $bill->nick_id	= $nick->id;
            $bill->total	= $nick->price;
            $bill->save();
            $nick = Nick::find($nick->id);
            $nick->status= '0';
            $nick->save();
            return view('bill.index',compact('nick'));
        }else{
            $nick = Nick::where('ms',$ms)->first();
            session(['countMoney'=>number_format($nick['price'],0,',','.')]);
            session(['author'=> Auth::user()->id]);
            $bill = new Bill();
            $bill->customer_id	= '0';
            $bill->nick_id	= $nick->id;
            $bill->total	= $nick->price;

            return view('bill.index',compact('nick'));
        }

    }
    public function saveBill($id){
        if (isset(Auth::user()->id)){
            $slider = Slider::orderBy('id','desc')->get();
            $nameAuthor = Auth::user()->name;
            $id = Auth::user()->id;
            $bill = Bill::where('customer_id','=',$id)->get();
//            dd($bill);
//            $collection = Collection::make($bill->total);

//            $totalMoney = $collection->sum();
            return view('bill.allBillCheck',compact('slider','bill','id','nameAuthor'))->with('nick');
        }else{
            $nameAuthor = "Bạn chưa đăng nhập";
            $slider = Slider::orderBy('id','desc')->get();
            $bill = '0';
            $id = '0';
            return view('bill.allBillCheck',compact('slider','bill','id','nameAuthor'))->with('nick');
        }

    }

}
