<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\SatisfacaoAddRequest;
use App\Http\Requests\SatisfacaoEditRequest;
use App\Http\Requests\Satisfacaoadd2Request;
use App\Models\Satisfacao;
use Illuminate\Http\Request;
use Exception;
class SatisfacaoController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Satisfacao::query();
		if($request->search){
			$search = trim($request->search);
			Satisfacao::search($query, $search);
		}
		if($request->orderby){
			$orderby = $request->orderby;
			$ordertype = ($request->ordertype ? $request->ordertype : "desc");
			$query->orderBy($orderby, $ordertype);
		}
		else{
			$query->orderBy("media", "ASC");
		}
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, Satisfacao::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Satisfacao::query();
		$record = $query->findOrFail($rec_id, Satisfacao::viewFields());
		return $this->respond($record);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add(SatisfacaoAddRequest $request){
		$modeldata = $request->validated();
		$modeldata['coletado_por'] = auth()->user()->name;
		
		//save Satisfacao record
		$record = Satisfacao::create($modeldata);
		$rec_id = $record->id;
		return $this->respond($record);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(SatisfacaoEditRequest $request, $rec_id = null){
		$query = Satisfacao::query();
		$record = $query->findOrFail($rec_id, Satisfacao::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $request->validated();
			$record->update($modeldata);
		}
		return $this->respond($record);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = Satisfacao::query();
		$query->whereIn("id", $arr_id);
		//to raise audit trail delete event, use Eloquent find before delete
		$query->get()->each(function ($record, $key) {
			$record->delete();
		});
		return $this->respond($arr_id);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add2(Satisfacaoadd2Request $request){
		$modeldata = $request->validated();
		$modeldata['coletado_por'] = auth()->user()->name;
		
		//save Satisfacao record
		$record = Satisfacao::create($modeldata);
		$rec_id = $record->id;
		return $this->respond($record);
	}
}
