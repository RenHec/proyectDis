<?php

namespace App\Imports;

use App\Models\Municipality;
use App\Models\Person;
use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class EmpleadoImport implements ToCollection
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $value) {
            $insert = new Person();
            $insert->cui = str_replace(' ','',$value[0]);
            $insert->name_one = $value[1];
            $insert->name_two = $value[2];
            $insert->last_name_one = $value[3];
            $insert->last_name_two = $value[4];
            $insert->direction = $value[5];
            $insert->email = $value[6];
            $insert->gender = $value[7]; 
            $insert->municipalities_id = Municipality::all()->random()->id;
            if($insert->save())
            {
                $new_user = new User();
                $new_user->cui = $insert->cui;
                $new_user->email = $insert->email;
                $new_user->email_verified_at = now();
                $new_user->password = bcrypt('secret');
                $new_user->people_id = $insert->id;
                if($new_user->save())
                    echo 'CUI '.$new_user->cui.' --- Email '.$new_user->email.PHP_EOL;
            }               
        }
    }
}
