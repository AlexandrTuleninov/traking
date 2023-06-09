<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public function providers()
    {
        return $this->belongsToMany(Providers::class);
    }
    public function country(){
        return $this->hasOne(Country::class);
    }

    public function add(){
        City::create(['name'=>$this->name,
        'counrty_id'=>$this->country_id,]);
        return view('city', compact('this'));
    }
    
}
