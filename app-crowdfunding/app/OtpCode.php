<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtpCode extends Model
{
    protected $table = "otp_code";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
