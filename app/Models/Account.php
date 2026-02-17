<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['owner_name', 'balance'];

    public function outgoingTransactions() {
        return $this->hasMany(Transaction::class, 'from_account_id');
    }
    public function incomingTransactions() {
        return $this->hasMany(Transaction::class, 'to_account_id');
    }
}
