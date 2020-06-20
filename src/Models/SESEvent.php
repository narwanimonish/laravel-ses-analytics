<?php

namespace Narwanimonish\SESEvents\Models;

use Illuminate\Database\Eloquent\Model;

class SESEvent extends Model
{
    public $guarded = [];

    protected $table = "ses_events";

    public function isDelivered()
    {
        return isset($this->delivered_at);
    }
}
