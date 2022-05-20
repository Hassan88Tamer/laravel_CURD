<?php

namespace App\Exports;

//use App\Models\Employee;
use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "id",
            "name",
            "email",
            "address",
        ];

    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Member::all();
        return collect(Member::getMember());
    }
}
