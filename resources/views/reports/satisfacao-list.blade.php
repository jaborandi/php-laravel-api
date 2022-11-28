
@extends('layouts.report')
@section('content')
<div id="report-title"><h1></h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Atend Recepcao</th>
            <th>Sala Triagem</th>
            <th>Atend Enfermagem</th>
            <th>Tempo Atendido</th>
            <th>Limpeza</th>
            <th>Gentileza</th>
            <th>Acomodacoes</th>
            <th>Frequencia</th>
            <th>Disposicao Equipe</th>
            <th>Média de satisfação</th>
            <th>Coletado em</th>
            <th>Considerações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->atend_recepcao }}</td>
            <td>{{ $record->sala_triagem }}</td>
            <td>{{ $record->atend_enfermagem }}</td>
            <td>{{ $record->tempo_atendido }}</td>
            <td>{{ $record->limpeza }}</td>
            <td>{{ $record->gentileza }}</td>
            <td>{{ $record->acomodacoes }}</td>
            <td>{{ $record->frequencia }}</td>
            <td>{{ $record->disposicao_equipe }}</td>
            <td>{{ $record->media }}</td>
            <td>{{ $record->inserido_em }}</td>
            <td>{{ $record->extra }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
