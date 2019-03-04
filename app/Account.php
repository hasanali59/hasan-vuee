<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function contact(){
        return $this->hasMany(Contact::class);
    }

    public function opportunity(){
        return $this->hasMany(AccountOpportunity::class);
    }

    public function note(){
        return $this->belongsTo(Note::class);
    }

    public function activity(){
        return $this->belongsTo(Activity::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
