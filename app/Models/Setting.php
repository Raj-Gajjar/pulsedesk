<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'app_name',

        'company_name',

        'timezone',

        'logo',

        'favicon',

        'survey_default_status',

        'allow_multiple_response',
    ];

    protected $casts = [

        'allow_multiple_response' => 'boolean',

    ];

    public static function getSettings(): self
    {
        return self::firstOrCreate([]);
    }
}
