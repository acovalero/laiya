<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use SoftDeletes;

    protected $fillable = ['fee_list_id','room_list_id','pax', 'amount'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id')->withTrashed();
    }

    // public function inquiry()
    // {
    //     return $this->belongsTo(Quotation::class, 'customer_id')->withTrashed();
    // }

    public function room()
    {
        return $this->belongsTo(Room::class, 'rooms_id')->withTrashed();
    }
}
