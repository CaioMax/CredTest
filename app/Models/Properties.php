<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;

    protected $table = 'properties';

    protected $fillable = [
        'address',
        'fk_owner'
    ];

    public function propertie()
    {
        return $this->belongsTo('App\Models\Owners', 'fk_owner');
    }

}
