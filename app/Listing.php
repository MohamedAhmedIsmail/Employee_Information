<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Listing extends Model
{
    protected $table = 'listings';
    protected $primaryKey = 'id';
    public function users()
    {
        return $this->belongsToMany('App\User', 'listing_user', 'listing_id', 'user_id');
        
    }
}
