<?php

namespace App\Services;


use App\Models\Type;

class TypeService
{
    public function getAll()
    {
        return Type::all();
    }
}
