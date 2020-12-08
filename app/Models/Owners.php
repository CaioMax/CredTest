<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owners extends Model
{
    use HasFactory;

    protected $table = 'owners';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'transfer_day'
    ];

    public function contracts()
    {
        return $this->hasMany('App\Models\Contracts', 'fk_client');
    }

    public function properties()
    {
        return $this->hasMany('App\Models\Properties', 'fk_properties');
    }


}
