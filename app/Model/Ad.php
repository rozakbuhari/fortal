<?php

namespace App\Model;


use App\Core\Model;
use Carbon\Carbon;

class Ad extends Model {
    
    protected $table = 'ads';
    
    protected $fillable = ['image', 'text', 'expired'];
    
    public function notExpired() {
        $ads = parent::get();
    
        $ads = array_filter($ads, function ($ad) {
            $expired = Carbon::parse($ad->expired);
            return Carbon::now()->lt($expired);
        });
        
        return $ads;
    }
}