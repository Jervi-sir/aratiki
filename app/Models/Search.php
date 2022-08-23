<?php

namespace App\Models;

use App\Models\Offer;
use App\Models\Advertiser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Search extends Model
{
    use HasFactory;

    public function advertiser() {
        return $this->belongsTo(Advertiser::class);
    }

    public function offer() {
        return $this->belongsTo(Offer::class);
    }
}
