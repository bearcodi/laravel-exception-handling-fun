<?php

namespace App;

use Throwable;
use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    /**
     * Guard attributes against mass assignment.
     * 
     * @var array
     */
    protected $guarded = [];
    
    /**
     * Create the error from exception.
     * 
     * @param   Throwable $e
     * @return  Error
     */
    public static function fromException(Throwable $e)
    {
        return self::create([
            'message' => $e->getMessage(),
            'code' => $e->getCode(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString(),
        ]);
    }
}
