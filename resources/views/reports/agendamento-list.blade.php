
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Retirada de dados por busca</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Especialidade</th>
            <th>Urgencia</th>
            <th>Data Pedido</th>
            <th>Data Entrada</th>
            <th>Data Realizacao</th>
            <th>Data Consulta</th>
            <th></th>
            <th>Status Agendamento Nome</th>
            <th>Status Agendamento Cor</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->municipes_nome }}</td>
            <td>{{ $record->tipo }} - {{ $record->especialidade }}</td>
            <td>{{ $record->urgencia }}</td>
            <td>{{ $record->data_pedido }}</td>
            <td>{{ $record->data_entrada }}</td>
            <td>{{ $record->data_realizacao }}</td>
            <td>{{ $record->data_consulta }}</td>
            <td>{{ $record->status }}</td>
            
            <td>{{ $record->status_agendamento_nome }}</td>
            <td>{{ $record->status_agendamento_cor }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
