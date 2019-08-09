@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Aulas do Cronograma</h1>
        <h1 class="pull-right">
            <ol class="breadcrumb breadcrumb-fp">
                <li><a href="/home"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! route('aulasCronogramas.index') !!}">Aulas do Cronograma</a></li>
                <li class="active">Lista</li>
            </ol>
        </h1>
    </section>
    <div class="clearfix"></div>
    <a class="btn btn-success" style="margin-left: 1rem"
        href="{!! route('aulasCronogramas.create') !!}"><i class="fa fa-plus"></i>  Adicionar</a>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary criar-unidade">
            <div class="box-body">
                    @include('aulas_cronogramas.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

