<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'wallet_id',
        'value',
        'type',
        'status',
        'confirmation_code',
    ];

    protected $casts = [
        'value' => 'decimal:2',
        'confirmation_code' => 'integer',
    ];

    const TYPE_INCOM = 'incom';
    const TYPE_EGRESS = 'egress';

    const STATUS_ENABLED = 'enabled';
    const STATUS_DISABLED = 'disabled';
    const STATUS_PENDING = 'pending';

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
