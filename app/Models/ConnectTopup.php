<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConnectTopup extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(WalletTransaction::class, 'connect_topup_id');
    }

}
