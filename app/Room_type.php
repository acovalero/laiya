<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Room_type extends Model
{
    use SoftDeletes;

    protected $fillable = ['room_type','price','rec_pax','max_pax'];

    /**
     * Set attribute to money format
     * @param $input
     */

}
