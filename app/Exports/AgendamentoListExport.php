<?php 

namespace App\Exports;
use App\Models\Agendamento;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class AgendamentoListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(Agendamento::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
    }
	
	public function headings(): array
    {
        return [
			'Nome',
			'Especialidade',
			'Urgencia',
			'Data Pedido',
			'Data Entrada',
			'Data Realizacao',
			'Data Consulta',
			'',
			'Status Agendamento Nome',
			'Status Agendamento Cor'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->municipes_nome,
			$record->tipo,
			$record->urgencia,
			$record->data_pedido,
			$record->data_entrada,
			$record->data_realizacao,
			$record->data_consulta,
			$record->status,
			$record->status_agendamento_nome,
			$record->status_agendamento_cor
        ];
    }
}
