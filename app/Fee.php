<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Fee extends Model
{
    use SoftDeletes;

    protected $fillable = ['quantity'];

    public function fee_types()
    {
        return $this->belongsTo(FeeType::class, 'fees_types_id')->withTrashed();
    }
}
