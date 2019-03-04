<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactOpportunity extends Model
{
    public function contact(){
        return $this->belongsTo(Contact::class);
    }

    public function note(){
        return $this->belongsTo(Note::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function file(){
        return $this->hasMany(File::class, 'type_id', 'id')->where('type_name', '=', 'contact_opportunity');
    }
}
