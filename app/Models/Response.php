<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = [
        'survey_id',
        'respondent_name',
        'respondent_email',
        'ip_address'
    ];

    public function survey(){
        return $this->belongsTo(Survey::class);
    }

    public function answers(){
        return $this->hasMany(ResponseAnswer::class);
    }
    
}
