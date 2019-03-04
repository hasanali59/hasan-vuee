<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function opportunity(){
        return $this->hasMany(ContactOpportunity::class);
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
