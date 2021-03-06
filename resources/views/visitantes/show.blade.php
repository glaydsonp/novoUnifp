@extends('layouts.app')

@section('title', 'Visitantes - Detalhes Cadastro')

@section('content')
<section class="content-header">
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('visitantes.index') !!}">Visitante</a></li>
            <li class="active">Detalhes</li>
        </ol>
    </h1>
    <h1>
        Detalhes do Cadastro do Visitante
    </h1>
</section>
<div class="content">
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row" style="padding-left: 20px">
                @include('visitantes.show_fields')
                <a href="{!! route('visitantes.index') !!}" class="btn btn-default">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
