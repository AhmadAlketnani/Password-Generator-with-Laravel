<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory;

    protected $fillable=['website','UserName','password',];


    // public function getNameAttribute($name) {

    //     return ucfirst($this->name);
    // }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search , function ($q) use ($search){
            return $q->where('website' , 'like' , "%$search%");
        });
    }
}


