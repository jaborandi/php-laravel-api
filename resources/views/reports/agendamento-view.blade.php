
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Confirmação de agendamento</h1></div>
<table class="table table-sm table-striped">
    <tbody>
        <tr>
            <th>Nome</th>
            <td>{{ $record->municipes_nome }}</td>
        </tr>
        <tr>
            <th>CPF</th>
            <td>{{ $record->municipes_cpf }}</td>
        </tr>
        <tr>
            <th>Data Pedido</th>
            <td>{{ $record->data_pedido }}</td>
        </tr>
        <tr>
            <th>Data Entrada</th>
            <td>{{ $record->data_entrada }}</td>
        </tr>
        <tr>
            <th>Data Realizacao</th>
            <td>{{ $record->data_realizacao }}</td>
        </tr>
        <tr>
            <th>Data Consulta</th>
            <td>{{ $record->data_consulta }}</td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td>{{ $record->tipo }}</td>
        </tr>
        <tr>
            <th>Especialidade</th>
            <td>{{ $record->especialidade }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $record->status_agendamento_nome }}</td>
        </tr>
    </tbody>
</table>
@endsection
