<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class Municipes extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'municipes';
	

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
	protected $fillable = ["cpf","nome","endereco","telefone","email","data_nasc","estado_civil","nis","carac_ind","carac_fam","inss","ocupacao","renda","despesas","inserido_por","inserido_em","atualizado_em","observacoes","numero","tipo_end","rg","endereco_completo","atualizado_por","idade","apagado_em","apagado","pai","mae","deficiencia","religiao","alerta_saude"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				nome LIKE ?  OR 
				cpf LIKE ?  OR 
				RG LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%"
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
			"nome", 
			"cpf", 
			"telefone", 
			"endereco_completo", 
			"idade", 
			"id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"nome", 
			"cpf", 
			"telefone", 
			"endereco_completo", 
			"idade", 
			"id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"cpf", 
			"nome", 
			"endereco", 
			"telefone", 
			"email", 
			"data_nasc", 
			"estado_civil", 
			"nis", 
			"carac_ind", 
			"carac_fam", 
			"inss", 
			"ocupacao", 
			"renda", 
			"despesas", 
			"inserido_por", 
			"inserido_em", 
			"atualizado_em", 
			"observacoes", 
			"numero", 
			"tipo_end", 
			"RG AS rg", 
			"endereco_completo", 
			"atualizado_por", 
			"idade", 
			"apagado_em", 
			"apagado", 
			"pai", 
			"mae", 
			"deficiencia", 
			"religiao", 
			"alerta_saude", 
			"id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"cpf", 
			"nome", 
			"endereco", 
			"telefone", 
			"email", 
			"data_nasc", 
			"estado_civil", 
			"nis", 
			"carac_ind", 
			"carac_fam", 
			"inss", 
			"ocupacao", 
			"renda", 
			"despesas", 
			"inserido_por", 
			"inserido_em", 
			"atualizado_em", 
			"observacoes", 
			"numero", 
			"tipo_end", 
			"RG AS rg", 
			"endereco_completo", 
			"atualizado_por", 
			"idade", 
			"apagado_em", 
			"apagado", 
			"pai", 
			"mae", 
			"deficiencia", 
			"religiao", 
			"alerta_saude", 
			"id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"cpf", 
			"nome", 
			"endereco", 
			"telefone", 
			"email", 
			"data_nasc", 
			"estado_civil", 
			"nis", 
			"carac_ind", 
			"carac_fam", 
			"inss", 
			"ocupacao", 
			"renda", 
			"despesas", 
			"inserido_por", 
			"inserido_em", 
			"atualizado_em", 
			"observacoes", 
			"numero", 
			"tipo_end", 
			"RG AS rg", 
			"endereco_completo", 
			"atualizado_por", 
			"idade", 
			"apagado_em", 
			"apagado", 
			"pai", 
			"mae", 
			"deficiencia", 
			"religiao", 
			"alerta_saude", 
			"id" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
	

	/**
     * Audit log events
     * 
     * @var array
     */
	protected $auditEvents = ['created', 'updated', 'deleted'];
}
