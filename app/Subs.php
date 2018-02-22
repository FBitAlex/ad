<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subs extends Model {
    
    protected $table = 'users';
    
    public static function getList() {
        return self::all();
    }

}
