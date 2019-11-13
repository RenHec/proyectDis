<?php

namespace App\Imports;

use App\Models\Municipality;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DepartamentoImport implements ToCollection
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            if(!is_null($value[0]))
            {
                $insert = new Municipality();
                $insert->name = $value[0];
                $insert->save();
            }
        }
    }
}
