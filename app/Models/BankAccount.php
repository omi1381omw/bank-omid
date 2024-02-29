<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends Model
{
    use HasFactory, SoftDeletes;

    public const NORMAL = 0;
    public const CHECK = 1;
    public const LOAN = 2;
    public const SAVING = 3;

    protected $fillable = [
        'type',
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
