<?php

namespace App\Http\Controllers;

use App\Models\AutoCode;

function generateCode(mixed $prefix, mixed $last_number)
{
    $last_number++;
    $last_number = str_pad($last_number, 4, '0', STR_PAD_LEFT);

    return $prefix.$last_number;
}

class AutoCodeController extends Controller
{
    public static function generateOrderCode()
    {
        $autoCode = AutoCode::query()->firstOrCreate(
            ['prefix' => 'ORD'],
            ['last_number' => 0]
        );

        $orderCode = generateCode($autoCode->prefix, $autoCode->last_number);

        $autoCode->last_number++;
        $autoCode->save();

        return $orderCode;
    }
}
