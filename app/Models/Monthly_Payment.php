<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthly_Payment extends Model
{
    use HasFactory;

    protected $table = 'monthly__payments';

    protected $fillable = [
        'fk_contract',
        'reference',
        'payment_value',
        'payment_status',
        'transfer_value',
        'transfer_status'

    ];

    public function contract()
    {
        return $this->belongsTo('App\Models\Contracts', 'fk_contract');
    }

}
