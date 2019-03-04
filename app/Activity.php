<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function account(){
        return $this->hasMany(Account::class, 'id', 'type_id');
    }

    public function contact(){
        return $this->hasMany(Contact::class,'id', 'type_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
