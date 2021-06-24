<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items()
    {
        return $this->belongsTo('App\Item');
    }
}
