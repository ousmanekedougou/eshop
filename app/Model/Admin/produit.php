<?php

namespace App\Model\Admin;
use App\Model\Admin\user;
use App\Model\Admin\category;
use App\Model\Admin\tag;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    public function tags()
    {
        return $this->belongsToMany(tag::class,'tag_produits');
    }

    public function categories()
    {
        return $this->belongsToMany(category::class,'category_produits');
    }

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function getPrice()
    {
        $price = $this->prix / 100;
        return number_format($price, 2, ',' , ' ') . 'f';
    }
}
