<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'client_id',
        'title',
        'description',
        'slug',
        'start_date',
        'end_date',
        'status',
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function questions(){
        return $this->hasMany(Question::class, 'survey_id')
            ->orderBy('sort_order');
    }

    public function responses(){
        return $this->hasMany(Response::class);
    }
}
