<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'survey_id',
        'question',
        'type',
        'required',
        'sort_order',
    ];

    public function survey(){
        return $this->belongsTo(Survey::class);
    }

    public function options(){
        return $this->hasMany(QuestionOption::class)
            ->orderBy('sort_order');
    }

    
}
