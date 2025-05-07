<?php

namespace App\Http\Controllers;

use App\Helpers\PointsHelper;
use App\Helpers\StripeCheckoutSuccess;

class CheckoutSuccessController extends Controller
{
    public function index($id)
    {
        $stripe_checkout = new StripeCheckoutSuccess();
        $successful = $stripe_checkout->updateCheckoutOrder($id);

        PointsHelper::clearPointsSession();
        $points_gained = $stripe_checkout->points_gained;

        if (!$successful) {
            abort(404);
        }

        return view('pages.default.checkout-successpage', compact('points_gained'));
    }
}
