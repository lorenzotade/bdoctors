<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sponsorship;
use Braintree;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorshipController extends Controller
{
  public function index()
  {
    $sponsorships = Sponsorship::all();
    $gateway = new Braintree\Gateway([
      'environment' => config('services.braintree.environment'),
      'merchantId' => config('services.braintree.merchantId'),
      'publicKey' => config('services.braintree.publicKey'),
      'privateKey' => config('services.braintree.privateKey')
    ]);

    $token = $gateway->ClientToken()->generate();

    return view('admin.sponsorships.index', compact('sponsorships', 'token'));
  }

  public function show($id)
  {
    $gateway = new Braintree\Gateway([
      'environment' => config('services.braintree.environment'),
      'merchantId' => config('services.braintree.merchantId'),
      'publicKey' => config('services.braintree.publicKey'),
      'privateKey' => config('services.braintree.privateKey')
    ]);

    $token = $gateway->ClientToken()->generate();
    $sponsorship = Sponsorship::find($id);
    $user = Auth::user();
    return view('admin.sponsorships.show', compact('sponsorship', 'token', 'user'));
  }

  public function purchasings()
  {
    $date_now = Carbon::now();
    $user = Auth::user();
    $sponsorships = $user->sponsorships;
    return view('admin.sponsorships.purchasings', compact('user', 'sponsorships', 'date_now'));
  }
}
