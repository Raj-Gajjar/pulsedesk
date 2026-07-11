<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'company_name',
        'contact_person',
        'email',
        'phone',
        'logo',
        'website',
        'address',
        'status',
    ];

    public function surveys(){
        return $this->hasMany(Survey::class);
    }
}
