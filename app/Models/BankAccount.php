<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_number',
        'user_id',
        'sheba',
        'cart',
        'balance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
