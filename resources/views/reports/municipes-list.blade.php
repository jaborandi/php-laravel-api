
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Exportar</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->nome }}</td>
            <td>{{ $record->idade }}</td>
            <td>{{ $record->telefone }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
