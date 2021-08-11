<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function(){
        // ROTTE ADMIN CRUD
        Route::resource('/user', 'UserController', ['names' => [
            'index' => 'dashboard'
        ]]);
        Route::get('/reviews', 'ReviewController@index')->name('reviews');
        Route::get('/messages', 'MessageController@index')->name('messages');
        Route::get('/messages/{id}', 'MessageController@show')->name('messages.show');
        Route::delete('/messages/{id}', 'MessageController@destroy')->name('messages.destroy');
        /* SPONSORSHIP */
        Route::get('/sponsorships', 'SponsorshipController@index')->name('sponsorships');
        Route::get('/sponsorships/{id}', 'SponsorshipController@show')->name('sponsorships.show');
        /* CHECKOUT BRAINTREE */
        Route::post('/checkout', function (Request $request) {
          $user = User::find(Auth::id());
          $sponsorship_id = $request->sponsorship_id;
          $duration = $request->duration;

          $gateway = new Braintree\Gateway([
          'environment' => config('services.braintree.environment'),
          'merchantId' => config('services.braintree.merchantId'),
          'publicKey' => config('services.braintree.publicKey'),
          'privateKey' => config('services.braintree.privateKey')
          ]);
          $amount = $request->amount;
          $nonce = $request->payment_method_nonce;

          $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
              'submitForSettlement' => true
            ]
            ]);

            /* attach user-sponsorship */
            $due_date = Carbon::now()->addHour($duration + 2);
            $user->sponsorships()->attach($sponsorship_id, ['due_date' => $due_date]);

            if($result->success){
              $transaction = $result->transaction;
              return view('admin.sponsorships.thankyou', compact('transaction', 'duration', 'amount'));
            } else {
              $errorString ="";
              foreach($result->errors->deepAll() as $error){
                $errorString .= 'Errore' . $error->code . ':' . $error->message . '\n';
              }

              return back()->withErrors('An error occurred with the message: ' .  $result->message);
            }
        });
        Route::get('/purchasings', 'SponsorshipController@purchasings')->name('sponsorships.purchasings');
    });

// ROTTE FRONTEND VUE
Route::get("{any?}", function() {
    return view("guest.home");
})->where("any", ".*");
