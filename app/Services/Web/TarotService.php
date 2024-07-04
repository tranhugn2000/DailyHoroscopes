<?php

namespace App\Services\Web;

use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\File;

class TarotService
{
    function __construct()
    {
    }
    
    public function getDataCards () {
        $path = database_path('card-data.json');

        $json = File::get($path);

        $cards = json_decode($json, true);

        shuffle($cards);

        return $cards;
    }

    public function readSelectedCards ($selected_cards) {
        $promt = 'With 3 cards: ' . $selected_cards[0].', ' . $selected_cards[1] .' and ' . $selected_cards[2] . 'Next, look up the corresponding tarot cards and their meanings. Finally, put together an overall reading for me based on the three cards (please write this in the p tag). Answer in Vietnamese';
        $result = Gemini::geminiPro()->generateContent($promt)->text();
   
        return $result;
    }
}
