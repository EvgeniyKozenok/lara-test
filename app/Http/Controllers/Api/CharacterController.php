<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Character;

class CharacterController extends Controller
{
    public function index()
    {
        $query = Character::with('episodes', 'quotes');

        request()->whenFilled('name', function ($input) use (&$query) {
            $query->whereRaw("LOWER(`name`) LIKE '%" . strtolower($input) . "%'");
        });

        return responder()->success($query->paginate($this->getPaginate()))->respond();
    }

    public function random()
    {
        return responder()->success(Character::inRandomOrder()->first())->respond();
    }
}
