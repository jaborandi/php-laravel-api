<?php 

namespace App\Exports;
use App\Models\Agendamento;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class AgendamentoViewExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	protected $query;

	protected $rec_id;

    public function __construct($query, $rec_id)
    {
        $this->query = $query->select(Agendamento::exportViewFields());
        $this->rec_id = $rec_id;
    }


    public function query()
    {
        return $this->query->where("id", $this->rec_id);
    }


	public function headings(): array
    {
        return [
			'Nome',
			'CPF',
			'Data Pedido',
			'Data Entrada',
			'Data Realizacao',
			'Data Consulta',
			'Tipo',
			'Especialidade',
			'Status'
        ];
    }


    public function map($record): array
    {
        return [
			$record->municipes_nome,
			$record->municipes_cpf,
			$record->data_pedido,
			$record->data_entrada,
			$record->data_realizacao,
			$record->data_consulta,
			$record->tipo,
			$record->especialidade,
			$record->status_agendamento_nome
        ];
    }
}
