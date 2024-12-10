<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Wallet;
use Paystack;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        $data = array_filter([
            "amount" => intval(request()->amount) * 100,
            "reference" => request()->reference,
            "email" => request()->email,
            "currency" => (request()->currency != ""  ? request()->currency : "NGN"),
            // "channels" => request()->channels,
            // "plan" => request()->plan,
            // "first_name" => request()->first_name,
            // "last_name" => request()->last_name,
            // "callback_url" => request()->callback_url,

            /*
                Paystack allows for transactions to be split into a subaccount -
                The following lines trap the subaccount ID - as well as the ammount to charge the subaccount (if overriden in the form)
                both values need to be entered within hidden input fields
            */
            // "subaccount" => request()->subaccount,
            // "transaction_charge" => request()->transaction_charge,

            /**
             * Paystack allows for transaction to be split into multi accounts(subaccounts)
             * The following lines trap the split ID handling the split
             * More details here: https://paystack.com/docs/payments/multi-split-payments/#using-transaction-splits-with-payments
             */
            // "split_code" => request()->split_code,

            /**
             * Paystack allows transaction to be split into multi account(subaccounts) on the fly without predefined split
             * form need an input field: <input type="hidden" name="split" value="{{ json_encode($split) }}" >
             * array must be set up as:
             *  $split = [
             *    "type" => "percentage",
             *     "currency" => "KES",
             *     "subaccounts" => [
             *       { "subaccount" => "ACCT_li4p6kte2dolodo", "share" => 10 },
             *       { "subaccount" => "ACCT_li4p6kte2dolodo", "share" => 30 },
             *     ],
             *     "bearer_type" => "all",
             *     "main_account_share" => 70,
             * ]
             * More details here: https://paystack.com/docs/payments/multi-split-payments/#dynamic-splits
             */
            // "split" => request()->split,

            /*
            * to allow use of metadata on Paystack dashboard and a means to return additional data back to redirect url
            * form need an input field: <input type="hidden" name="metadata" value="{{ json_encode($array) }}" >
            * array must be set up as:
            * $array = [ 'custom_fields' => [
            *                   ['display_name' => "Cart Id", "variable_name" => "cart_id", "value" => "2"],
            *                   ['display_name' => "Sex", "variable_name" => "sex", "value" => "female"],
            *                   .
            *                   .
            *                   .
            *                  ]
            *          ]
            */
            // 'metadata' => request()->metadata
        ]);

        try{
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
        // Update user wallet
    }

    /**
     * Handles updating the user wallet
     */
    private function updateWalletBalance($amount)
    {
        $user = Auth::user();
        $wallet = $user->wallet;
        $balance = $wallet->balance;
        $wallet->update([
            'balance' => $balance += $amount
        ]);
    }
}
