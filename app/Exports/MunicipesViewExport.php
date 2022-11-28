<?php 

namespace App\Exports;
use App\Models\Municipes;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class MunicipesViewExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	protected $query;

	protected $rec_id;

    public function __construct($query, $rec_id)
    {
        $this->query = $query->select(Municipes::exportViewFields());
        $this->rec_id = $rec_id;
    }


    public function query()
    {
        return $this->query->where("id", $this->rec_id);
    }


	public function headings(): array
    {
        return [
			'Cpf',
			'Nome',
			'Endereco',
			'Telefone',
			'Email',
			'Data Nasc',
			'Estado Civil',
			'Nis',
			'Carac Ind',
			'Carac Fam',
			'Inss',
			'Ocupacao',
			'Renda',
			'Despesas',
			'Inserido Por',
			'Inserido Em',
			'Atualizado Em',
			'Observacoes',
			'Numero',
			'Tipo End',
			'Rg',
			'Endereco Completo',
			'Atualizado Por',
			'Idade',
			'Apagado Em',
			'Apagado',
			'Pai',
			'Mae',
			'Deficiencia',
			'Religiao',
			'Alerta Saude',
			'Id'
        ];
    }


    public function map($record): array
    {
        return [
			$record->cpf,
			$record->nome,
			$record->endereco,
			$record->telefone,
			$record->email,
			$record->data_nasc,
			$record->estado_civil,
			$record->nis,
			$record->carac_ind,
			$record->carac_fam,
			$record->inss,
			$record->ocupacao,
			$record->renda,
			$record->despesas,
			$record->inserido_por,
			$record->inserido_em,
			$record->atualizado_em,
			$record->observacoes,
			$record->numero,
			$record->tipo_end,
			$record->rg,
			$record->endereco_completo,
			$record->atualizado_por,
			$record->idade,
			$record->apagado_em,
			$record->apagado,
			$record->pai,
			$record->mae,
			$record->deficiencia,
			$record->religiao,
			$record->alerta_saude,
			$record->id
        ];
    }
}
