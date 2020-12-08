<meta name="csrf-token" content="{!! csrf_token() !!}">
@extends('adminlte::page')

@section('title', 'Cadastros')

@section('content_header')
    <h1 class="m-0 text-dark">Cadastros</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-6">
            <!--Client-->
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Clientes</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="client_form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="InputEmail">Email</label>
                            <input type="email" class="form-control" name="email" id="InputEmail" placeholder="Digite o email">
                        </div>
                        <div class="form-group">
                            <label for="InputPhone">Telefone</label>
                            <input type="text" class="form-control" name="phone" id="InputPhone" placeholder="Telefone">
                        </div>
                        <div class="form-group">
                            <label for="InputName">Nome</label>
                            <input type="text" class="form-control" name="name" id="InputName" placeholder="Nome">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-secondary">Enviar</button>
                    </div>
                </form>
            </div>
            <!--Owner-->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Contratos</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="contract_form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="SelectClient">Cliente</label>
                            <div class="row">
                                <div class="col-sm-11">
                                    <select class="form-control" name="fk_client" id="SelectClient">
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-lg btn-primary" type="button" id="ClientSearch"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="SelectOwner">Proprietário</label>
                            <div class="row">
                                <div class="col-sm-11">
                                    <select class="form-control" name="fk_owner" id="SelectOwner">
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-lg btn-primary" type="button" id="OwnerSearch"><i class="fa fa-search"></i></button>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="SelectPropertie">Imóvel</label>
                            <select class="form-control" name="fk_propertie" id="SelectPropertie">
                                <option>...</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="InputDate1">Dia inicial</label>
                                    <input type="text" name="dt_start" class="form-control date" id="InputDate1" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="InputDate2">Dia final</label>
                                    <input type="text" name="dt_end" class="form-control date" id="InputDate2" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="InputAdmin">Taxa de administração</label>
                                    <input type="text" name="admin_fee" class="form-control" id="InputAdmin" placeholder="0.00">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="InputRent">Valor do Aluguel</label>
                                    <input type="text" name="rent_amount" class="form-control decimal" id="InputRent" placeholder="R$">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="InputCondo">Valor do condomínio</label>
                                    <input type="text" name="condo_fee" class="form-control decimal" id="InputCondo" placeholder="R$">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="InputIPTU">Valor do Iptu</label>
                                    <input type="text" name="iptu" class="form-control decimal" id="InputIPTU" placeholder="R$">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <!--Owner-->
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Propriétarios</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="owner_form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="InputEmail">Email</label>
                            <input type="email" class="form-control" name="email" id="InputEmail" placeholder="Digite o email">
                        </div>
                        <div class="form-group">
                            <label for="InputPhone">Telefone</label>
                            <input type="text" class="form-control" name="phone" id="InputPhone" placeholder="Telefone">
                        </div>
                        <div class="form-group">
                            <label for="InputName">Nome</label>
                            <input type="text" class="form-control" name="name" id="InputName" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="InputDay">Dia do repasse</label>
                            <input type="number" min="1" max="31" class="form-control" name="transfer_day" id="InputDay" placeholder="Nome">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-danger">Enviar</button>
                    </div>
                </form>
            </div>
            <!--Properite-->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Imóveis</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="propertie_form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="InputAddress">Eendereço</label>
                            <textarea class="form-control" id="InputAddress" name="address" rows="3" placeholder="Digite o endereço"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="SelectOwner2">Proprietário</label>
                            <div class="row">
                                <div class="col-sm-11">
                                    <select class="form-control" name="fk_owner" id="SelectOwner2">
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-lg btn-primary" type="button" id="OwnerSearch2"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="{{ asset('/vendor/mask/dist/jquery.mask.js')}}"></script>
    <script src="{{ asset('/js/components/create.js')}}"></script>
@endsection




