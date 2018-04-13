<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomList extends Model
{
    public function rooms()
    {
        return $this->belongsTo(Room::class, 'rooms_id')->withTrashed();
    }
}
