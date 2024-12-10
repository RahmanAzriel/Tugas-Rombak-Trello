<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::orderBy('created_at', 'DESC')->get();
    }
    public function headings(): array
    { return [
        'ID',
        'Name',
        'Email',
        'NIS',
        'Rombel',
        'Kelas',
        'Rayon',
        'Created At',
    ];
    }

    public function map($siswa): array
    {
        return [
            $siswa->id,
            $siswa->name,
            $siswa->email,
            $siswa->nis,
            $siswa->rombel,
            $siswa->kelas,
            $siswa->rayon,
            $siswa->created_at,
        ];
    }
}
