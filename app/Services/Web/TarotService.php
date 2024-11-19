<?php

namespace App\Services\Web;

use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class TarotService
{
    function __construct() {}

    public function getDataCards()
    {
        if (App::getLocale() == 'vi') {
            $path = database_path('card-data.json');
        } else {
            $path = database_path('card-data-en.json');
        }

        $json = File::get($path);

        $cards = json_decode($json, true);

        shuffle($cards);

        foreach ($cards as &$card) {
            $card['status'] = rand(0, 1);
        }

        return $cards;
    }

    public function readSelectedCards($selected_cards)
    {
        if (App::getLocale() == 'vi') {
            $promt = 'With 3 cards: ' . $selected_cards[0]['name'] . ', ' . $selected_cards[1]['name'] . ' and ' . $selected_cards[2]['name'] . 
            'Next, look up the corresponding tarot cards and their meanings. Finally, put together an overall reading for me based on the three cards. Answer in Vietnamese. Please format your response in HTML.';
            dd($promt);

        } else {
            $promt = 'With 3 cards: ' . $selected_cards[0]['name'] . ', ' . $selected_cards[1]['name'] . ' and ' . $selected_cards[2]['name'] . 'Next, look up the corresponding tarot cards and their meanings. Finally, put together an overall reading for me based on the three cards.Please format your response in HTML.';
        }
        $result = Gemini::geminiPro()->generateContent($promt)->text();
        return $result;
    }
}
