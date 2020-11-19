<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quote;

class QuoteController extends Controller
{
    public function index()
    {
        return responder()->success(Quote::paginate($this->getPaginate()))->respond();
    }

    public function random()
    {
        $query = Quote::with('character')->whereHas('character', function ($q) {
            request()->whenFilled('author', function ($input) use ($q) {
                $q->whereRaw("LOWER(`name`) LIKE '%" . strtolower($input) . "%'");
            });
        });

        $response = $query->inRandomOrder()->first();

        return $response ? responder()->success($response)->respond() : responder()->error(404, __('Quote author not found'));
    }

    public function characterQuotes($characterId)
    {
        $query = Quote::whereHas('character', function ($q) use ($characterId) {
            $q->where('id', $characterId);
        });

        $response = $query->get();

        return $response ? responder()->success($response)->respond() : responder()->error(404, __('Quote not found'));
    }
}
