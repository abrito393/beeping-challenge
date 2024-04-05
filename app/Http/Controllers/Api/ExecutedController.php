<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ExecutedCreateRequest;
use App\Models\Executed;
use Illuminate\Support\Facades\Log;

class ExecutedController extends Controller
{
    public function create(ExecutedCreateRequest $request)
    {
        $validated = $request->validated();

        $executed = Executed::create($validated);

        return response()->json($executed, 201);
    }
}
