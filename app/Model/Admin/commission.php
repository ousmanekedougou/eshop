<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class commission extends Model
{
    public function teams()
    {
        return $this->belongsToMany('App\Model\Admin\team','team_commissions');
    }
}
