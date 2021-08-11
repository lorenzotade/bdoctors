<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use App\Review;
use App\Spec;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $users = User::where('id', $request->id);
      $avg = $request->query('avg'); 
      $city = $request->query('city');
      $spec_id = $request->query('spec');
      $ordered = $request->query('ordered');

      if ($spec_id > 0) {
          /* primo controllo per specializzazione */
          $spec_id = $request->query('spec');
          $users = User::with(['profile', 'services', 'specs', 'reviews', 'sponsorships'])->whereHas('specs', function ($query) use ($spec_id) {
          return $query->where('spec_id', $spec_id);
          })->get();
        $users = $users->filter(function($user) use ($avg){
          $user->avg_user = $user->reviews->avg('vote');
          return $user->reviews->avg('vote') >= $avg;
        }); 
        if ($city != '' && $avg > 0) {
          /* ordina i risultati per numero di recensioni, se richiesto, e poi per città e media voto; sennò soltanto per città e media voto. */
          if($ordered){
            $users = User::withCount('reviews')->orderBy('reviews_count', 'desc')->with(['profile', 'services', 'specs', 'reviews', 'sponsorships'])->whereHas('specs', function ($query) use ($spec_id) {
              return $query->where('spec_id', $spec_id);
            })->get();
            $users = $users->where('city', $city);
            $users = $users->filter(function($user) use ($avg){
              $user->avg_user = $user->reviews->avg('vote');
            return $user->reviews->avg('vote') >= $avg;
          });
          }
          /* filtro per ricerca avanzata sia per città che per media voti */
          $users = $users->where('city', $city);
          $users = $users->filter(function($user) use ($avg){
            $user->avg_user = $user->reviews->avg('vote');
          return $user->reviews->avg('vote') >= $avg;
          });
        } elseif($city != '') {
          /* ordina i risultati per numero di recensioni, se richiesto, e poi per città; sennò soltanto per città. */
          if($ordered){
            $users = User::withCount('reviews')->orderBy('reviews_count', 'desc')->with(['profile', 'services', 'specs', 'reviews', 'sponsorships'])->whereHas('specs', function ($query) use ($spec_id) {
            return $query->where('spec_id', $spec_id);
            })->get();
            $users = $users->where('city', $city);
            $users = $users->filter(function($user){
              $user->avg_user = $user->reviews->avg('vote');
            return $user;
            });
          }
          /* filtro per ricerca avanzata solo per città */
          $users = $users->where('city', $city);
          $users = $users->filter(function($user){
            $user->avg_user = $user->reviews->avg('vote');
            return $user;
          });
        } elseif($avg > 0){
          /* ordina i risultati per numero di recensioni, se richiesto, e poi per media voto; sennò soltanto per media voto. */
          if($ordered){
            $users = User::withCount('reviews')->orderBy('reviews_count', 'desc')->with(['profile', 'services', 'specs', 'reviews', 'sponsorships'])->whereHas('specs', function ($query) use ($spec_id) {
              return $query->where('spec_id', $spec_id);
            })->get();
            $users = $users->filter(function($user) use ($avg){
              $user->avg_user = $user->reviews->avg('vote');
            return $user->reviews->avg('vote') >= $avg;
            });
          }
          /* filtro per ricerca avanzata solo per media voti */
          $users = $users->filter(function($user) use ($avg){
            $user->avg_user = $user->reviews->avg('vote');
          return $user->reviews->avg('vote') >= $avg;
          });
        } elseif ($ordered) {
          $users = User::withCount('reviews')->orderBy('reviews_count', 'desc')->with(['profile', 'services', 'specs', 'reviews', 'sponsorships'])->whereHas('specs', function ($query) use ($spec_id) {
            return $query->where('spec_id', $spec_id);
            })->get();
          $users = $users->filter(function($user){
            $user->avg_user = $user->reviews->avg('vote');
            return $user;
          });
        }       
      } else {
        /* restituisce tutti gli utenti senza controlli */
        $users = User::with(['profile', 'services', 'specs', 'reviews', 'sponsorships'])->get();
        $users = $users->filter(function($user){
          $user->avg_user = $user->reviews->avg('vote');
          return $user;
        });
      }
      
      $reviews = Review::all();
      $messages = Message::all();
      $specs = Spec::all();

      return response()->json([
        'users' => $users,
        'specialization' => $specs, 
        'reviews' => $reviews,
        'messages' => $messages
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = User::where('slug', $slug)->with(['profile','specs', 'services', 'reviews'])->first();
        $user->avg_user = $user->reviews->avg('vote');
        if($user){
          return response()->json([
            'success' => true,
            'result' => $user
          ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'Nessun post trovato'
        ]);
    }
}
