<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public static function create(Request $request)
    {
        if (csrf_token() !== $request->get('_token')) {
            abort(403, 'csrf token mismatch');
        }
        $order = new Order(
            [
                'amount' => $request->get('amount'),
                'delivery_email' => $request->get('email'),
            ]
        );
        $order->user()->associate(auth()->user());
        $order->save();

        $message = sprintf(
            'Sie haben erfolgreich %s Lizenzen bestellt. Die Lizenzschlüssel wurden an die Adresse %s verschickt.',
            $order->amount,
            $order->delivery_email
        );
        return redirect('dashboard')->with('message', $message);
    }
}
