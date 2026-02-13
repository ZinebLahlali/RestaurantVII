<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Restaurant extends Model
{
    protected $fillable = [
        'nom',
        'localisation',
        'type_de_cuisine',
        'horaires',
        'statut',
        'capacite'
    ];


public function favoritedByUsers(): BelongsToMany
{
      return $this->belongsToMany(User::class, 'users_favorites', 'restaurant_id', 'user_id')->withTimestamps();
}


public function capacityPercent(): float
{
    if($this->max_capacity == 0){
        return 0;
    }
    return ($this->capacity / $this->max_capacity) * 100;
}

public function is90percent(): bool
{
    return $this->capacityPercent() >= 90;
}


public function reservations() 
{ 
    return $this->hasMany(Reservation::class);
    
}





}
