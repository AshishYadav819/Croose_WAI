<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'client_id', 'name', 'description', 'duration_minutes', 'price', 'category'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
