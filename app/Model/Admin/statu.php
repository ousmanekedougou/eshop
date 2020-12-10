<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class statu extends Model
{
    public function teams()
    {
        return $this->belongsToMany('App\Model\Admin\team','team_status');
    }
}
