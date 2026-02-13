<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Facades\Auth;



class ReservationController extends Controller
{
     public function showReserveForm($id)
     {
        $restaurantId = $id;
        return view('restaurant.reservation',['restaurant_id' => $restaurantId]);
     }

   public function create($restaurantId)
   {
      $restaurant= Restaurant::findOrFail($restaurantId);

      if(Auth::user()->role != 'client'){
        return back()->with('error', 'seuelment pour les clients');
      }

      return view('restaurant.reservation', compact('restaurant'));
   }

   


   public function store(Request $request)
   {
    $request->validate([
        'restaurant_id' => 'required|exists:restaurants,id',
        'dateReservation' => 'required|date|after_or_equal:today',
        'nombrePersonnes' => 'required|integer|min:1',
    ]);

     
        $restaurant= Restaurant::findOrFail($request->restaurant_id);

        if($restaurant->status == 'maintenance'){
            return back()->with('error', 'Restaurant fermé pour le moment');
        }

        $nombrePersonnes= Reservation::where('restaurant_id', $request->restaurant_id)
         ->where('dateReservation', $request->dateReservation)
         ->sum('nombrePersonnes');

         $newTotal = $nombrePersonnes + $request->nomberPersonnes;

         if($newTotal > $restaurant->capacity) {
             return back()->with('error', 'Désolé, le restaurant est plein!');
            
         }

         Reservation::create([
            'user_id' => Auth::user()->id,
            'restaurant_id' => $request->restaurant_id,
            'dateReservation' => $request->dateReservation,
            'nombrePersonnes' => $request->nombrePersonnes,
         ]);

       if($newTotal >= $restaurant->capacity * 0.9) {
            return redirect()->route('restaurant')
                ->with('warning', 'Réservation OK mais presque complet !');
        }


        return redirect()->route('restaurant')
            ->with('success', 'Réservation effectuée avec succès');
    }






   }

   

    




