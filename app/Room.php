<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Room
 *
 * @package App
 * @property string $room_number
 * @property integer $floor
 * @property text $description
 */
class Room extends Model
{
    use SoftDeletes;

    protected $fillable = ['room_number','room_types_id','status','description'];

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setFloorAttribute($input)
    {
        $this->attributes['floor'] = $input ? $input : null;
    }

    public function room_types()
    {
        return $this->belongsTo(Room_type::class, 'room_types_id')->withTrashed();
    }

    public function setRoomTypeIdAttribute($input)
    {
        $this->attributes['room_types_id'] = $input ? $input : null;
    }

    public function booking()
    {
        return $this->HasOne(Booking::class, 'rooms_id')->withTrashed();
    }

}
