<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Member;
use App\Models\Laundry;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $total_payment;

    function index(){
        if (auth()->user()->position === 'owner' || 'cashier') {
            $member = Member::where('id_member', auth()->user()->id)->first();
            if (auth()->user()->position === 'cashier' && $member == null) {
                $listLaundry = Laundry::paginate(25);
            }else{
                if (auth()->user()->position === 'owner') {
                    $data_laundy = User::find(auth()->user()->id)->datalaundry;
                    $ordering = Order::select(['user_order','total_order','cost','payment_completed',DB::raw('MONTH(created_at) month, YEAR(created_at) year')])->where('laundry_id', $data_laundy->id)->get();
                    $user_ordering = User::find(collect(Order::select('user_order')->where('laundry_id', $data_laundy->id)->get()))->groupBy('id');
                }else{
                    $data_laundy = Member::where('id_member', auth()->user()->id)->first()->id_laundry;
                    $ordering = Order::select(['id','user_order','total_order','cost','payment_completed',DB::raw('MONTH(created_at) month, YEAR(created_at) year')])->where('laundry_id', $data_laundy)->get();
                    $user_ordering = User::find(collect(Order::select('user_order')->where('laundry_id', $data_laundy)->get()))->groupBy('id');
                }
                $ordering->each(function($i){
                    $this->total_payment += $i['cost'];
                });
                $data_ordering = [
                    'data_user'=> $user_ordering->toArray(),
                    'ordering'=> $ordering->toArray()
                ];
            }
            $datas = [
                'data_ordering' => !empty($data_ordering) ? $data_ordering : [],
                'laundry'       => $member,
                'listLaundry'   => (!empty($listLaundry)) ? $listLaundry : [],
                'data_laundry'  => (!empty($data_laundy)) ? $data_laundy : [],
            ];

        }else{

        }

        return view('index', [
            'title'   =>  'Home',
            'datas'   =>  $datas,
            'total_payment' => ($this->total_payment == null) ? null : $this->total_payment
        ]);
    }
}
