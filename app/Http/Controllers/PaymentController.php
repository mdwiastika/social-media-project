<?php

namespace App\Http\Controllers;

use App\Models\CoinTransaction;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'coin' => 'required|min:1|max:999999',
                'gross_amount' => 'required|min:1',
                'payment_type' => 'required',
                'transaction_id' => 'required',
                'transaction_status' => 'required',
            ]);
            isset($request->payment_code) ? $validatedData['payment_code'] = $request->payment_code : $validatedData['payment_code'] = '';
            isset($request->pdf_url) ? $validatedData['pdf_url'] = $request->pdf_url : $validatedData['pdf_url'] = '';
            isset($request->order_id) ? $validatedData['order_id'] = $request->order_id : $validatedData['order_id'] = '';
            $validatedData['user_id'] = Auth::id();
            $coin_transaction = CoinTransaction::create($validatedData);
            if ($coin_transaction->transaction_status == 'settlement') {
                $user = User::where('id', Auth::id())->first();
                $user->coin = $user->coin + $request->coin;
                $user->save();
            }

            return response()->json($request->all(), 202);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 503);
        }
    }

    public function shareCoin(Request $request)
    {
        $validatedData = $request->validate([
            'coin' => 'required|numeric',
            'post_id' => 'required',
            'user_id' => 'required',
        ]);
        if (auth()->user()->coin < $request->coin) {
            return response()->json([
                'message' => 'Coin tidak cukup',
            ], 503);
        } else {
            // Pertukaran coin
            $user = User::where('id', Auth::id())->first();
            $user_get_coin = User::where('id', $request->user_id)->first();
            $user->coin = $user->coin - $request->coin;
            $user->save();
            $user_get_coin->coin = $user_get_coin->coin + $request->coin;
            $user_get_coin->save();

            // comment coin
            $comment = new Comment;
            $comment->body = 'Send coin x'.$request->coin;
            $comment->user()->associate(Auth::user());
            $comment->coin = 'active';
            $post = Post::find($request->post_id);
            $post->comments()->save($comment);

            return response()->json([
                'message' => 'success',
                'request' => $request->all(),
            ], 202);
        }
    }
}
