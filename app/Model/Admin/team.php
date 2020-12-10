<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    public function commissions()
    {
        return $this->belongsToMany('App\Model\Admin\commission','team_commissions');
    }

    public function status()
    {
        return $this->belongsToMany('App\Model\Admin\statu','team_status');
    }
}
