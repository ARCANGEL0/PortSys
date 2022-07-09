<?php

namespace App\Exports;

use App\Models\Movimentacoes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class exportarRelatorio implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Movimentacoes::all();
    }

 public function headings(): array
    {
        return [
          '#',
          'Tipo de movimentação',
          'Data de inicio',
          'Data fim',
        'Conteiner',

        ];
    }

}

