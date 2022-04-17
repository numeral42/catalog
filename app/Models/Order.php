<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=['provider_id','date','status'];

    //Relación uno a muchos inversa
     
 public function provider(){
     return $this->belongsTo(Provider::class);
 }
 
  //Relación muchos a muchos
  public function products(){
     return $this->belongsToMany(Product::class);
 }
}
