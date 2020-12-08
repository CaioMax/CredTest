<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    use HasFactory;

    protected $table = 'contracts';

    protected $fillable = [
        'fk_client',
        'fk_owner',
        'fk_propertie',
        'dt_start',
        'dt_end',
        'admin_fee',
        'rent_amount',
        'condo_fee',
        'iptu'
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Clients', 'fk_client');
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\Owners', 'fk_owner');
    }

    public function propertie()
    {
        return $this->belongsTo('App\Models\Properties', 'fk_propertie');
    }

}
