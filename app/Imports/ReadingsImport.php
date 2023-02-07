<?php

namespace App\Imports;

use App\Models\Reading;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ReadingsImport implements ToCollection
{
    private $is_electricity;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function  __construct($is_electricity)
    {
        $this->is_electricity= $is_electricity;
    }

    public function collection(Collection $rows)
    {
        $first_key = $rows->keys()->first();
        $collection = $rows->forget($first_key);
        dd($collection);
    }
}
