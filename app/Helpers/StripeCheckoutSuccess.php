<?php

namespace App\Helpers;

use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;

class StripeCheckoutSuccess
{
    protected $stripe;
    public int $points_gained = 0;
    public function __construct()
    {
        $this->stripe = StripeClient::getClient();
    }

    public function updateCheckoutOrder($session_id)
    {
        // check order in database
        $order = Order::where('payment_id', $session_id)->first();

        if (!$order) {
            return false;
        }
        // get order in stripe
        $stripe_helper = new StripeCheckout();
        $session = $stripe_helper->getCheckoutOrder($session_id);

        // dd($session);

        $order_completed_data = $stripe_helper->getOrderCompletedData($session);

        $this->points_gained = $order->points_gained;

        // Get shipping id from database
        if ($order && $order->payment_status == 'unpaid') {
            $user_id = $order->user_id;
            //$user = User::where('id', $user_id)->first();
            $user = User::where('id', $user_id)->first();

            $shipping_id = Shipping::where('stripe_id', $order_completed_data['stripe_id'])
            ->get()
            ->first()
            ->id;
            // update order table
            $order->subtotal = $order_completed_data['subtotal'];
            $order->total = $order_completed_data['total'];
            $order->shipping_id = $shipping_id;
            $order->payment_status = 'paid';

            if(!$this->updatePoints($order, $user)){
                return false;
            }

            $order->save();

            // @requires remove comment b4 demo
            // User::find($user_id)->products()->detach();

            return true;
        }

        return true;
    }

    public function updatePoints(Order $order, User $user){
        if($order->points_exchanged > $user->total_points){
            return false;
        }

        $this->points_gained = $order->points_gained;
        User::subtractPoints($user->id, $order->points_exchanged)->get();
        User::addPoints($user->id, $order->points_gained)->get();
        PointsHelper::clearPointsSession();

        return true;
    }
}
