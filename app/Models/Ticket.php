<?php

namespace App\Models;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    public function offer() {
        return $this->belongsTo(Offer::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
