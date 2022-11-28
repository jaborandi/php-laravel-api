<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgendamentoAddRequest;
use App\Http\Requests\AgendamentoEditRequest;
use App\Models\Agendamento;
use Illuminate\Http\Request;
use \PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AgendamentoListExport;
use App\Exports\AgendamentoViewExport;
use Illuminate\Support\Facades\DB;
use Exception;
class AgendamentoController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Agendamento::query();
		if($request->search){
			$search = trim($request->search);
			Agendamento::search($query, $search);
		}
		$query->join("municipes", "agendamento.municipe", "=", "municipes.id");
		$query->join("status_agendamento", "agendamento.status", "=", "status_agendamento.id");
		$orderby = $request->orderby ?? "agendamento.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		if($request->agendamento_data_pedido){
			$fromDate = $request->agendamento_data_pedido['from'] ?? null;
			$toDate = $request->agendamento_data_pedido['to'] ?? null;
			if($fromDate && $toDate){
				$query->whereRaw("agendamento.data_pedido BETWEEN ? AND ?", [$fromDate, $toDate]);
			}
			elseif($fromDate){
				$query->whereRaw("agendamento.data_pedido >= ?", [$fromDate]);
			}
			elseif($toDate){
				$query->whereRaw("agendamento.data_pedido <= ?", [$toDate]);
			}
		}
		if($request->agendamento_data_entrada){
			$fromDate = $request->agendamento_data_entrada['from'] ?? null;
			$toDate = $request->agendamento_data_entrada['to'] ?? null;
			if($fromDate && $toDate){
				$query->whereRaw("agendamento.data_entrada BETWEEN ? AND ?", [$fromDate, $toDate]);
			}
			elseif($fromDate){
				$query->whereRaw("agendamento.data_entrada >= ?", [$fromDate]);
			}
			elseif($toDate){
				$query->whereRaw("agendamento.data_entrada <= ?", [$toDate]);
			}
		}
		if($request->agendamento_data_realizacao){
			$fromDate = $request->agendamento_data_realizacao['from'] ?? null;
			$toDate = $request->agendamento_data_realizacao['to'] ?? null;
			if($fromDate && $toDate){
				$query->whereRaw("agendamento.data_realizacao BETWEEN ? AND ?", [$fromDate, $toDate]);
			}
			elseif($fromDate){
				$query->whereRaw("agendamento.data_realizacao >= ?", [$fromDate]);
			}
			elseif($toDate){
				$query->whereRaw("agendamento.data_realizacao <= ?", [$toDate]);
			}
		}
		if($request->agendamento_data_consulta){
			$fromDate = $request->agendamento_data_consulta['from'] ?? null;
			$toDate = $request->agendamento_data_consulta['to'] ?? null;
			if($fromDate && $toDate){
				$query->whereRaw("agendamento.data_consulta BETWEEN ? AND ?", [$fromDate, $toDate]);
			}
			elseif($fromDate){
				$query->whereRaw("agendamento.data_consulta >= ?", [$fromDate]);
			}
			elseif($toDate){
				$query->whereRaw("agendamento.data_consulta <= ?", [$toDate]);
			}
		}
		if(!empty($request->agendamento_especialidade)){
			$val = $request->agendamento_especialidade;
			$query->where(DB::raw("agendamento.especialidade"), "=", $val);
		}
		if(!empty($request->agendamento_urgencia)){
			$val = $request->agendamento_urgencia;
			$query->where(DB::raw("agendamento.urgencia"), "=", $val);
		}
		if(!empty($request->agendamento_status)){
			$val = $request->agendamento_status;
			$query->where(DB::raw("agendamento.status"), "=", $val);
		}
		// if request format is for export example:- product/index?export=pdf
		if($this->getExportFormat()){
			return $this->ExportList($query); // export current query
		}
		$records = $this->paginate($query, Agendamento::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Agendamento::query();
		$query->join("municipes", "agendamento.municipe", "=", "municipes.id");
		$query->join("status_agendamento", "agendamento.status", "=", "status_agendamento.id");
		// if request format is for export example:- product/view/344?export=pdf
		if($this->getExportFormat()){
			return $this->ExportView($query, $rec_id);
		}
		$record = $query->findOrFail($rec_id, Agendamento::viewFields());
		return $this->respond($record);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add(AgendamentoAddRequest $request){
		$modeldata = $request->validated();
		$modeldata['inserido_por'] = auth()->user()->name;
		
		//save Agendamento record
		$record = Agendamento::create($modeldata);
		$rec_id = $record->id;
		return $this->respond($record);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AgendamentoEditRequest $request, $rec_id = null){
		$query = Agendamento::query();
		$record = $query->findOrFail($rec_id, Agendamento::editFields());
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
		$query = Agendamento::query();
		$query->whereIn("id", $arr_id);
		//to raise audit trail delete event, use Eloquent find before delete
		$query->get()->each(function ($record, $key) {
			$record->delete();
		});
		return $this->respond($arr_id);
	}
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function data_pedido(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Agendamento::query();
		if($request->search){
			$search = trim($request->search);
			Agendamento::search($query, $search);
		}
		$query->join("municipes", "agendamento.municipe", "=", "municipes.id");
		$query->join("status_agendamento", "agendamento.status", "=", "status_agendamento.id");
		$orderby = $request->orderby ?? "agendamento.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		$query->where("data_pedido", "!=" , "");
$query->WhereNotNull("data_pedido");
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, Agendamento::dataPedidoFields());
		return $this->respond($records);
	}
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function data_entrada(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Agendamento::query();
		if($request->search){
			$search = trim($request->search);
			Agendamento::search($query, $search);
		}
		$query->join("municipes", "agendamento.municipe", "=", "municipes.id");
		$query->join("status_agendamento", "agendamento.status", "=", "status_agendamento.id");
		$orderby = $request->orderby ?? "agendamento.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		$query->where("data_entrada", "!=" , "");
$query->WhereNotNull("data_entrada");
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, Agendamento::dataEntradaFields());
		return $this->respond($records);
	}
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function data_realizacao(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Agendamento::query();
		if($request->search){
			$search = trim($request->search);
			Agendamento::search($query, $search);
		}
		$query->join("municipes", "agendamento.municipe", "=", "municipes.id");
		$query->join("status_agendamento", "agendamento.status", "=", "status_agendamento.id");
		$orderby = $request->orderby ?? "agendamento.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		$query->where("data_realizacao", "!=" , "");
$query->WhereNotNull("data_realizacao");
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, Agendamento::dataRealizacaoFields());
		return $this->respond($records);
	}
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function data_consulta(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Agendamento::query();
		if($request->search){
			$search = trim($request->search);
			Agendamento::search($query, $search);
		}
		$query->join("municipes", "agendamento.municipe", "=", "municipes.id");
		$query->join("status_agendamento", "agendamento.status", "=", "status_agendamento.id");
		$orderby = $request->orderby ?? "agendamento.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		$query->where("data_consulta", "!=" , "");
$query->WhereNotNull("data_consulta");
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, Agendamento::dataConsultaFields());
		return $this->respond($records);
	}
	

	/**
     * Export table records to different format
	 * supported format:- PDF, CSV, EXCEL, HTML
	 * @param \Illuminate\Database\Eloquent\Model $query
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
	private function ExportList($query){
		ob_end_clean(); // clean any output to allow file download
		$filename = "ListAgendamentoReport-" . date_now();
		$format = $this->getExportFormat();
		if($format == "print"){
			$records = $query->get(Agendamento::exportListFields());
			return view("reports.agendamento-list", ["records" => $records]);
		}
		elseif($format == "pdf"){
			$records = $query->get(Agendamento::exportListFields());
			$pdf = PDF::loadView("reports.agendamento-list", ["records" => $records]);
			return $pdf->download("$filename.pdf");
		}
		elseif($format == "csv"){
			return Excel::download(new AgendamentoListExport($query), "$filename.csv", \Maatwebsite\Excel\Excel::CSV);
		}
		elseif($format == "excel"){
			return Excel::download(new AgendamentoListExport($query), "$filename.xlsx", \Maatwebsite\Excel\Excel::XLSX);
		}
	}
	

	/**
     * Export single record to different format
	 * supported format:- PDF, CSV, EXCEL, HTML
	 * @param \Illuminate\Database\Eloquent\Model $record
	 * @param string $rec_id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
	private function ExportView($query, $rec_id){
		ob_end_clean();// clean any output to allow file download
		$filename ="ViewAgendamentoReport-" . date_now();
		$format = $this->getExportFormat();
		if($format == "print"){
			$record = $query->findOrFail($rec_id, Agendamento::exportViewFields());
			return view("reports.agendamento-view", ["record" => $record]);
		}
		elseif($format == "pdf"){
			$record = $query->findOrFail($rec_id, Agendamento::exportViewFields());
			$pdf = PDF::loadView("reports.agendamento-view", ["record" => $record]);
			return $pdf->download("$filename.pdf");
		}
		elseif($format == "csv"){
			return Excel::download(new AgendamentoViewExport($query, $rec_id), "$filename.csv", \Maatwebsite\Excel\Excel::CSV);
		}
		elseif($format == "excel"){
			return Excel::download(new AgendamentoViewExport($query, $rec_id), "$filename.xlsx", \Maatwebsite\Excel\Excel::XLSX);
		}
	}
}
