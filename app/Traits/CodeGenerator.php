<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait CodeGenerator
{
    function generateCode($entityName) {
        $prefix = DB::table('code_prefixes')->where('entity_name', $entityName)->value('prefix');
        return $prefix . uniqid();
    }
}
