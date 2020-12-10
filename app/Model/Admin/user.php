<?php

namespace App\Model\Admin;
use App\Model\Admin\category;
use App\Model\Admin\produit;
use App\Model\Admin\tag;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $fillable = [
        'nom', 'email', 'password','genre','prenom','addresse','date','phone','image'
    ];
    
    public function produits()
    {
        return $this->hasMany(produit::class);
    }

    public function categories(){
        return $this->hasMany(category::class);
    }

    public function tags(){
        return $this->hasMany(tag::class);
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
