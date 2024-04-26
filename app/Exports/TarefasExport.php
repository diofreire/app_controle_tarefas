<?php

namespace App\Exports;

use App\Models\Tarefa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TarefasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return Collection
    */
    public function collection()
    {
        return auth()->user()->tarefas()->get();
    }

    /**
     * Adiciona título no arquivo
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID Tarefa',
            'Tarefa',
            'Data Limite Conclusão',
            'Data criação'
        ];
    }

    /**
     * Atua nos dados exportados
     * @param Collection $row
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->id,
            $row->tarefa,
            date('d/m/Y', strtotime($row->data_limite_conclusao)),
            date('d/m/Y H:m:s', strtotime($row->created_at))
        ];
    }
}
