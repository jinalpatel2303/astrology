<?php

namespace App\Exports;

use App\Models\registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class ExportUser implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return registration::where('status',0)->get();


    }
}


