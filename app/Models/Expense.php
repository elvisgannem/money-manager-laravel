<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'description', 'amount', 'month'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function month()
    {
        return $this->hasOne(Months::class);
    }
}
