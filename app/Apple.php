<?php

namespace App;

use App\Events\OnAppleCreatedEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Apple extends Model {

    protected $table = 'apples';

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function scopeOdd($q){
        return $q->whereRaw('id % 2 = 1')->whereNull('grabbed_by');
    }

    public function scopeEven($q){
        return $q->whereRaw('id % 2 = 0')->whereNull('grabbed_by');
    }
}
