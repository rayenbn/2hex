<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Facades\Wheels;
use App\Models\Wheel\HardnessPrice;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class WheelController extends Controller
{
    /**    
     * Get all shapes
     *
     * @return JsonResponse
     */
    public function getHanbook() : JsonResponse
    {
        $response = [
            'types' => Wheels::types(),
            'shapes' => Wheels::shapes(),
            'options' => Wheels::options()->pluck('option_value', 'option_name'),
            'hardnessPrices' => HardnessPrice::query()->get()
        ];

        return response()->json($response);
    }
}
