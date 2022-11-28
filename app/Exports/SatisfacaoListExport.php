<?php 

namespace App\Exports;
use App\Models\Satisfacao;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class SatisfacaoListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(Satisfacao::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
    }
	
	public function headings(): array
    {
        return [
			'Atend Recepcao',
			'Sala Triagem',
			'Atend Enfermagem',
			'Tempo Atendido',
			'Limpeza',
			'Gentileza',
			'Acomodacoes',
			'Frequencia',
			'Disposicao Equipe',
			'Média de satisfação',
			'Coletado em',
			'Considerações'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->atend_recepcao,
			$record->sala_triagem,
			$record->atend_enfermagem,
			$record->tempo_atendido,
			$record->limpeza,
			$record->gentileza,
			$record->acomodacoes,
			$record->frequencia,
			$record->disposicao_equipe,
			$record->media,
			$record->inserido_em,
			$record->extra
        ];
    }
}
