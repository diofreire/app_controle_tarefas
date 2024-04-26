<?php

namespace App\Exports;

use App\Models\Tarefa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TarefasExport implements FromCollection, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection()
    {
        return auth()->user()->tarefas()->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID Tarefa',
            'ID Usuário',
            'Tarefa',
            'Data Limite Conclusão',
            'Data criação',
            'Data Atualização'
        ];
    }
}
