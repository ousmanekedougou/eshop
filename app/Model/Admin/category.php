<?php

namespace App\Model\Admin;
use App\Model\Admin\user;
use App\Model\Admin\produit;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function produits()
    {
        return $this->belongsToMany(produit::class,'category_produits');
    }

    public function user(){
        return $this->belongsTo(user::class);
    }
}
