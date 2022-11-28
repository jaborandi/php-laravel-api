
@extends('layouts.report')
@section('content')
<div id="report-title"><h1></h1></div>
<table class="table table-sm table-striped">
    <tbody>
        <tr>
            <th>Cpf</th>
            <td>{{ $record->cpf }}</td>
        </tr>
        <tr>
            <th>Nome</th>
            <td>{{ $record->nome }}</td>
        </tr>
        <tr>
            <th>Endereco</th>
            <td>{{ $record->endereco }}</td>
        </tr>
        <tr>
            <th>Telefone</th>
            <td>{{ $record->telefone }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $record->email }}</td>
        </tr>
        <tr>
            <th>Data Nasc</th>
            <td>{{ $record->data_nasc }}</td>
        </tr>
        <tr>
            <th>Estado Civil</th>
            <td>{{ $record->estado_civil }}</td>
        </tr>
        <tr>
            <th>Nis</th>
            <td>{{ $record->nis }}</td>
        </tr>
        <tr>
            <th>Carac Ind</th>
            <td>{{ $record->carac_ind }}</td>
        </tr>
        <tr>
            <th>Carac Fam</th>
            <td>{{ $record->carac_fam }}</td>
        </tr>
        <tr>
            <th>Inss</th>
            <td>{{ $record->inss }}</td>
        </tr>
        <tr>
            <th>Ocupacao</th>
            <td>{{ $record->ocupacao }}</td>
        </tr>
        <tr>
            <th>Renda</th>
            <td>{{ $record->renda }}</td>
        </tr>
        <tr>
            <th>Despesas</th>
            <td>{{ $record->despesas }}</td>
        </tr>
        <tr>
            <th>Inserido Por</th>
            <td>{{ $record->inserido_por }}</td>
        </tr>
        <tr>
            <th>Inserido Em</th>
            <td>{{ $record->inserido_em }}</td>
        </tr>
        <tr>
            <th>Atualizado Em</th>
            <td>{{ $record->atualizado_em }}</td>
        </tr>
        <tr>
            <th>Observacoes</th>
            <td>{{ $record->observacoes }}</td>
        </tr>
        <tr>
            <th>Numero</th>
            <td>{{ $record->numero }}</td>
        </tr>
        <tr>
            <th>Tipo End</th>
            <td>{{ $record->tipo_end }}</td>
        </tr>
        <tr>
            <th>Rg</th>
            <td>{{ $record->rg }}</td>
        </tr>
        <tr>
            <th>Endereco Completo</th>
            <td>{{ $record->endereco_completo }}</td>
        </tr>
        <tr>
            <th>Atualizado Por</th>
            <td>{{ $record->atualizado_por }}</td>
        </tr>
        <tr>
            <th>Idade</th>
            <td>{{ $record->idade }}</td>
        </tr>
        <tr>
            <th>Apagado Em</th>
            <td>{{ $record->apagado_em }}</td>
        </tr>
        <tr>
            <th>Apagado</th>
            <td>{{ $record->apagado }}</td>
        </tr>
        <tr>
            <th>Pai</th>
            <td>{{ $record->pai }}</td>
        </tr>
        <tr>
            <th>Mae</th>
            <td>{{ $record->mae }}</td>
        </tr>
        <tr>
            <th>Deficiencia</th>
            <td>{{ $record->deficiencia }}</td>
        </tr>
        <tr>
            <th>Religiao</th>
            <td>{{ $record->religiao }}</td>
        </tr>
        <tr>
            <th>Alerta Saude</th>
            <td>{{ $record->alerta_saude }}</td>
        </tr>
        <tr>
            <th>Id</th>
            <td>{{ $record->id }}</td>
        </tr>
    </tbody>
</table>
@endsection
