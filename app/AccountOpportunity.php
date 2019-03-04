<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountOpportunity extends Model
{
    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function note(){
        return $this->belongsTo(Note::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function file(){
        return $this->hasMany(File::class, 'type_id', 'id')->where('type_name', '=', 'account_opportunity');
    }
}
