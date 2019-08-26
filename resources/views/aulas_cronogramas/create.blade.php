@extends('layouts.app')

@section('content')
<section class="content-header" style="margin-bottom: 10px">
    <h1 class="pull-left">Aulas do Cronograma</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('cronogramas.index') !!}">Cronogramas</a></li>
            <li><a href="{!! route('aulasCronogramas.index') !!}">Aulas do Cronograma</a></li>
            <li class="active">Adicionar</li>
        </ol>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'aulasCronogramas.store']) !!}

                @include('aulas_cronogramas.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
