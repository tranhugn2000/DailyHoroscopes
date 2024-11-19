<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\TarotService;
use Illuminate\Http\Request;

class TarotController extends Controller
{
    protected $tarotService;

    function __construct(TarotService $tarotService)
    {
        $this->tarotService = $tarotService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = $this->tarotService->getDataCards();
        return view('clients.pages.tarot.index', compact('cards'));
    }
     
    public function getShuffledCards()
    {
        $cards = $this->tarotService->getDataCards();
        return response()->json($cards);
    }
    
    public function readSelectedCards(Request $request)
    {
        $selected_cards =  $request->input('cards');

        $result = $this->tarotService->readSelectedCards($selected_cards);
        info($result);
        return response()->json($result);
    }

    
}
