<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Satisfacao extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'satisfacao';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = ["atend_recepcao","sala_triagem","atend_enfermagem","tempo_atendido","limpeza","gentileza","acomodacoes","frequencia","disposicao_equipe","extra"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				atend_recepcao LIKE ?  OR 
				sala_triagem LIKE ?  OR 
				atend_enfermagem LIKE ?  OR 
				tempo_atendido LIKE ?  OR 
				limpeza LIKE ?  OR 
				gentileza LIKE ?  OR 
				acomodacoes LIKE ?  OR 
				frequencia LIKE ?  OR 
				disposicao_equipe LIKE ?  OR 
				extra LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"id", 
			"atend_recepcao", 
			"sala_triagem", 
			"atend_enfermagem", 
			"tempo_atendido", 
			"limpeza", 
			"gentileza", 
			"acomodacoes", 
			"frequencia", 
			"disposicao_equipe", 
			DB::raw("(atend_recepcao+sala_triagem+atend_enfermagem+tempo_atendido+limpeza+gentileza+acomodacoes+frequencia+disposicao_equipe)/9 AS media"), 
			"inserido_em", 
			"extra" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id", 
			"atend_recepcao", 
			"sala_triagem", 
			"atend_enfermagem", 
			"tempo_atendido", 
			"limpeza", 
			"gentileza", 
			"acomodacoes", 
			"frequencia", 
			"disposicao_equipe", 
			DB::raw("(atend_recepcao+sala_triagem+atend_enfermagem+tempo_atendido+limpeza+gentileza+acomodacoes+frequencia+disposicao_equipe)/9 AS media"), 
			"inserido_em", 
			"extra" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"id", 
			"atend_recepcao", 
			"sala_triagem", 
			"atend_enfermagem", 
			"tempo_atendido", 
			"limpeza", 
			"gentileza", 
			"acomodacoes", 
			"frequencia", 
			"disposicao_equipe", 
			"extra", 
			"inserido_em" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"id", 
			"atend_recepcao", 
			"sala_triagem", 
			"atend_enfermagem", 
			"tempo_atendido", 
			"limpeza", 
			"gentileza", 
			"acomodacoes", 
			"frequencia", 
			"disposicao_equipe", 
			"extra", 
			"inserido_em" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id", 
			"atend_recepcao", 
			"sala_triagem", 
			"atend_enfermagem", 
			"tempo_atendido", 
			"limpeza", 
			"gentileza", 
			"acomodacoes", 
			"frequencia", 
			"disposicao_equipe", 
			"extra" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = true;
	const CREATED_AT = 'inserido_em'; 
	const UPDATED_AT = 'atualizado_em'; 
}
