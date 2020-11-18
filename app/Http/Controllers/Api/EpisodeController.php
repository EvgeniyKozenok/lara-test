<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;

class EpisodeController extends Controller
{
    public function index()
    {
        return responder()->success(Episode::paginate($this->getPaginate()))->respond();
    }

    public function show($id)
    {
        $response = Episode::with('characters')->find($id);
        return $response
            ? responder()->success($response)->respond()
            : responder()->error(404, __('Episode not found'));
    }
}
