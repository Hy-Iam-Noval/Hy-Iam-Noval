<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function add(Request $request){
        $request->validate([
            'email'=>['required'],
            'total_order' =>  ['required'],
            'cost' =>  ['required'],
        ]);
        $user = User::where('email', $request['email'])->first();
        if ($user == null) 
            return redirect()->back()->withErrors('User not found', 'email_not_found');
        $add = array_merge(collect($user)->toArray(),collect($request)->except(['_token', 'email'])->toArray());
        $add = collect($add)->except(['email', 'name', 'position','created_at', 'updated_at']);
        Order::create($add->put('user_order', $add['id'])->except('id')->toArray());
        return redirect()->back()->with('success', 'success');
    }

    function remove($id){
        Order::find($id)->delete();
        return redirect()->back()->with('success', 'success');
    }

    function payment_complete($id){
        Order::find($id)->update(['payment_complete'=>true]);
        return redirect()->back()->with('success', 'success');
    }
}
