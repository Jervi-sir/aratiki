<?php

namespace App\Models;

use App\Models\Keyword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory;

    public function advertiser() {
        return $this->belongsTo(Advertiser::class);
    }

    public function template() {
        return $this->belongsTo(Template::class);
    }

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    public function keywords() {
        return $this->belongsToMany(Keyword::class, 'offer_keyword');
    }
}
