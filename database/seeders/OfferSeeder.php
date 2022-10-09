<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offer = new Offer();
        $offer->uuid = Str::uuid();
        $offer->user_id = '';
        $offer->advertiser_id = '';
        $offer->category_id = '';
        $offer->payment_id = '';
        $offer->event_name = '';
        $offer->description = '';
        $offer->user_id = '';
        $offer->iamges = '';
        $offer->event_starts = '';
        $offer->event_ends = '';
        $offer->duration = '';
        $offer->hasVip = '';
        $offer->price_economy = '';
        $offer->total_ticket_economy = '';
        $offer->otal_tickets_economy = '';
        $offer->ticket_left_economy = 'computer event';
        $offer->payment_type_name = 'computer';
        $offer->advertiser_name = 'computer';
        $offer->advertiser_details = 'computer';
        $offer->phone_number = 'computer';
        $offer->for_search = 'computer';

    }
}
