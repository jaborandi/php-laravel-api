<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components Data Contoller
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Controller
 */
class Components_dataController extends Controller{
	public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['users_name_exist','users_email_exist']]);
    }
	/**
     * municipe_option_list Model Action
     * @return array
     */
	function municipe_option_list(Request $request){
		$arr = [];
		if(!empty($request->search)){
			$sqltext = "SELECT  DISTINCT id AS value,nome AS label,cpf AS caption FROM municipes WHERE nome LIKE :search ORDER BY nome ASC LIMIT 0,10" ;
			$query_params = [];
			$search = trim($request->search);
$query_params['search'] = "%$search%";
			$arr = DB::select(DB::raw($sqltext), $query_params);
		}
		return $arr;
	}
	/**
     * tipo_option_list Model Action
     * @return array
     */
	function tipo_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT tipo AS value,tipo AS label FROM especialidades ORDER BY tipo ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * especialidade_option_list Model Action
     * @return array
     */
	function especialidade_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,nome AS label,tipo AS caption FROM especialidades WHERE tipo=:lookup_tipo ORDER BY nome ASC" ;
		$query_params = [];
		$query_params['lookup_tipo'] = request()->lookup_tipo;
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * status_option_list Model Action
     * @return array
     */
	function status_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,nome AS label FROM status_agendamento ORDER BY nome ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * check if name value already exist in Users
	 * @param string $value
     * @return bool
     */
	function users_name_exist(Request $request, $value){
		$exist = DB::table('users')->where('name', $value)->value('name');   
		if($exist){
			return "true";
		}
		return "false";
	}
	/**
     * check if email value already exist in Users
	 * @param string $value
     * @return bool
     */
	function users_email_exist(Request $request, $value){
		$exist = DB::table('users')->where('email', $value)->value('email');   
		if($exist){
			return "true";
		}
		return "false";
	}
	/**
     * agendamento_especialidade_option_list Model Action
     * @return array
     */
	function agendamento_especialidade_option_list(Request $request){
		$sqltext = "SELECT DISTINCT especialidade AS value,especialidade AS label,tipo AS caption FROM agendamento ORDER BY tipo, especialidade ASC" ;
		$query_params = [];
		$search = trim($request->search);
$query_params['search'] = "%$search%";
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
}
