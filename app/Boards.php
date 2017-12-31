<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boards extends Model
{
    protected $table = 'boards';

    public function info(){
        return $this->hasOne('App\LayoutInfo', 'board_id', 'id');
    }
}
