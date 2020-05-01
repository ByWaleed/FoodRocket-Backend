<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function offerItems() {
        return $this->hasMany('App\OfferItem', 'offer_id');
    }
}
