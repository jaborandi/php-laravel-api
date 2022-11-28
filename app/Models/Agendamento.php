<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class Agendamento extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'agendamento';
	

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
	protected $fillable = ["urgencia","municipe","tipo","especialidade","data_pedido","data_entrada","data_realizacao","data_consulta","inserido_por","status"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				municipes.cpf LIKE ?  OR 
				municipes.nome LIKE ?  OR 
				municipes.rg LIKE ? 
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
			"agendamento.id AS id", 
			"agendamento.municipe AS municipe", 
			"municipes.nome AS municipes_nome", 
			"agendamento.tipo AS tipo", 
			"agendamento.especialidade AS especialidade", 
			"status_agendamento.nome AS status_agendamento_nome", 
			"agendamento.urgencia AS urgencia", 
			"agendamento.data_pedido AS data_pedido", 
			"agendamento.data_entrada AS data_entrada", 
			"agendamento.data_realizacao AS data_realizacao", 
			"agendamento.data_consulta AS data_consulta", 
			"municipes.id AS municipes_id", 
			"status_agendamento.id AS status_agendamento_id", 
			"status_agendamento.cor AS status_agendamento_cor" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"agendamento.id AS id", 
			"agendamento.municipe AS municipe", 
			"municipes.nome AS municipes_nome", 
			"agendamento.tipo AS tipo", 
			"agendamento.especialidade AS especialidade", 
			"status_agendamento.nome AS status_agendamento_nome", 
			"agendamento.urgencia AS urgencia", 
			"agendamento.data_pedido AS data_pedido", 
			"agendamento.data_entrada AS data_entrada", 
			"agendamento.data_realizacao AS data_realizacao", 
			"agendamento.data_consulta AS data_consulta", 
			"municipes.id AS municipes_id", 
			"status_agendamento.id AS status_agendamento_id", 
			"status_agendamento.cor AS status_agendamento_cor" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"agendamento.id AS id", 
			"municipes.nome AS municipes_nome", 
			"municipes.cpf AS municipes_cpf", 
			"agendamento.data_pedido AS data_pedido", 
			"agendamento.data_entrada AS data_entrada", 
			"agendamento.data_realizacao AS data_realizacao", 
			"agendamento.data_consulta AS data_consulta", 
			"agendamento.tipo AS tipo", 
			"agendamento.especialidade AS especialidade", 
			"agendamento.urgencia AS urgencia", 
			"municipes.id AS municipes_id", 
			"status_agendamento.id AS status_agendamento_id", 
			"status_agendamento.nome AS status_agendamento_nome" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"agendamento.id AS id", 
			"municipes.nome AS municipes_nome", 
			"municipes.cpf AS municipes_cpf", 
			"agendamento.data_pedido AS data_pedido", 
			"agendamento.data_entrada AS data_entrada", 
			"agendamento.data_realizacao AS data_realizacao", 
			"agendamento.data_consulta AS data_consulta", 
			"agendamento.tipo AS tipo", 
			"agendamento.especialidade AS especialidade", 
			"agendamento.urgencia AS urgencia", 
			"municipes.id AS municipes_id", 
			"status_agendamento.id AS status_agendamento_id", 
			"status_agendamento.nome AS status_agendamento_nome" 
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
			"urgencia", 
			"municipe", 
			"tipo", 
			"especialidade", 
			"data_pedido", 
			"data_entrada", 
			"data_realizacao", 
			"data_consulta", 
			"inserido_por", 
			"status" 
		];
	}
	

	/**
     * return dataPedido page fields of the model.
     * 
     * @return array
     */
	public static function dataPedidoFields(){
		return [ 
			"agendamento.id AS id", 
			"agendamento.data_pedido AS data_pedido", 
			"municipes.nome AS municipes_nome", 
			"municipes.id AS municipes_id", 
			"status_agendamento.id AS status_agendamento_id", 
			"status_agendamento.cor AS status_agendamento_cor" 
		];
	}
	

	/**
     * return exportDataPedido page fields of the model.
     * 
     * @return array
     */
	public static function exportDataPedidoFields(){
		return [ 
			"agendamento.id AS id", 
			"agendamento.data_pedido AS data_pedido", 
			"municipes.nome AS municipes_nome", 
			"municipes.id AS municipes_id", 
			"status_agendamento.id AS status_agendamento_id", 
			"status_agendamento.cor AS status_agendamento_cor" 
		];
	}
	

	/**
     * return dataEntrada page fields of the model.
     * 
     * @return array
     */
	public static function dataEntradaFields(){
		return [ 
			"agendamento.id AS id", 
			"agendamento.data_entrada AS data_entrada", 
			"municipes.nome AS municipes_nome", 
			"municipes.id AS municipes_id", 
			"status_agendamento.id AS status_agendamento_id", 
			"status_agendamento.cor AS status_agendamento_cor" 
		];
	}
	

	/**
     * return exportDataEntrada page fields of the model.
     * 
     * @return array
     */
	public static function exportDataEntradaFields(){
		return [ 
			"agendamento.id AS id", 
			"agendamento.data_entrada AS data_entrada", 
			"municipes.nome AS municipes_nome", 
			"municipes.id AS municipes_id", 
			"status_agendamento.id AS status_agendamento_id", 
			"status_agendamento.cor AS status_agendamento_cor" 
		];
	}
	

	/**
     * return dataRealizacao page fields of the model.
     * 
     * @return array
     */
	public static function dataRealizacaoFields(){
		return [ 
			"agendamento.id AS id", 
			"agendamento.data_realizacao AS data_realizacao", 
			"municipes.nome AS municipes_nome", 
			"municipes.id AS municipes_id", 
			"status_agendamento.id AS status_agendamento_id", 
			"status_agendamento.cor AS status_agendamento_cor" 
		];
	}
	

	/**
     * return exportDataRealizacao page fields of the model.
     * 
     * @return array
     */
	public static function exportDataRealizacaoFields(){
		return [ 
			"agendamento.id AS id", 
			"agendamento.data_realizacao AS data_realizacao", 
			"municipes.nome AS municipes_nome", 
			"municipes.id AS municipes_id", 
			"status_agendamento.id AS status_agendamento_id", 
			"status_agendamento.cor AS status_agendamento_cor" 
		];
	}
	

	/**
     * return dataConsulta page fields of the model.
     * 
     * @return array
     */
	public static function dataConsultaFields(){
		return [ 
			"agendamento.id AS id", 
			"agendamento.data_consulta AS data_consulta", 
			"municipes.nome AS municipes_nome", 
			"municipes.id AS municipes_id", 
			"status_agendamento.id AS status_agendamento_id", 
			"status_agendamento.cor AS status_agendamento_cor" 
		];
	}
	

	/**
     * return exportDataConsulta page fields of the model.
     * 
     * @return array
     */
	public static function exportDataConsultaFields(){
		return [ 
			"agendamento.id AS id", 
			"agendamento.data_consulta AS data_consulta", 
			"municipes.nome AS municipes_nome", 
			"municipes.id AS municipes_id", 
			"status_agendamento.id AS status_agendamento_id", 
			"status_agendamento.cor AS status_agendamento_cor" 
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
	

	/**
     * Audit log events
     * 
     * @var array
     */
	protected $auditEvents = ['created', 'updated', 'deleted'];
}
