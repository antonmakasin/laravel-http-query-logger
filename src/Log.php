<?php

namespace Oskingv\HttpQueryLogger;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /**
     *
     * @var string
     */
    protected $table = 'http_query_logs';
    //
    protected $guarded = [];
}
