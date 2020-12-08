<meta name="csrf-token" content="{!! csrf_token() !!}">
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Contratros</h1>

@stop

@section('content')


    <div class="card card-primary">
        <div class="card-header">
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Propietário</th>
                        <th>Imóvel</th>
                        <th>Data de inicio/fim</th>
                        <th>Taxa</th>
                        <th>Aluguel</th>
                        <th>Condomínio</th>
                        <th>IPTU</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contracts as $contract)
                        <tr>
                            <td>{{$contract->client->name}}</td>
                            <td>{{$contract->owner->name}}</td>
                            <td>{{$contract->propertie->address}}</td>
                            <td>{{$contract->dt_start . '/' . $contract->dt_end}}</td>
                            <td>{{$contract->admin_fee * 100 . "%"}}</td>
                            <td>{{'R$'. $contract->rent_amount}}</td>
                            <td>{{'R$'. $contract->condo_fee}}</td>
                            <td>{{'R$'. $contract->iptu}}</td>
                            <td><a class="btn btn-primary" href="{{url('/months/'.$contract->id)}}">
                            Mensialidades/Repasses</a></td>
                        </tr>
                    @empty

                    <p>Nenhum contrato existente</p>

                    @endforelse

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>

    </div>

@stop





