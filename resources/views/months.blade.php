<meta name="csrf-token" content="{!! csrf_token() !!}">
@extends('adminlte::page')

@section('title', 'Mensalidades')

@section('content_header')
    <h1 class="m-0 text-dark">Mensalidades/Repasses</h1>

@stop

@section('content')


    <div class="card card-success">
        <div class="card-header">
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mês</th>
                        <th>Valor da Mensalidade</th>
                        <th>Status da Mensalidade</th>
                        <th>Valor do Repasse</th>
                        <th>Status do Repasse</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($monthly_payments as $payment)
                        <tr>
                            <td>{{$payment->reference}}</td>
                            <td>{{$payment->payment_value}}</td>
                            <td>
                                <button data-id={{$payment->id}} data-status={{$payment->payment_status}} class=" <?php echo  $payment->payment_status ? "payment btn btn-success" : "payment btn btn-danger" ?>" >
                                    <?php echo $payment->payment_status ? "Pago" : "Não Pago" ?>
                                </button>
                            </td>
                            <td>{{$payment->transfer_value}}</td>
                            <td>
                                <button data-id={{$payment->id}} data-status={{$payment->transfer_status}} class=" <?php echo $payment->transfer_status ? "transfer btn btn-success" : "transfer btn btn-danger" ?>" >
                                    <?php echo $payment->transfer_status ?  "Realizado" : "Não Realizado" ?>
                                </button>
                            </td>
                        </tr>
                    @empty

                    <p>Nenhum Mensalidade encontrada</p>

                    @endforelse

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>

    </div>

@stop

@section('js')
    <script src="{{ asset('/js/components/months.js')}}"></script>
@endsection




