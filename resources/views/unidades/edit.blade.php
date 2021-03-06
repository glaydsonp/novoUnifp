@extends('layouts.app')

@section('title', 'Unidades - Editar')

@section('content')
<section class="content-header">
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('unidades.index') !!}">Unidade</a></li>
            <li class="active">Editar</li>
        </ol>
    </h1>
    <h1>
        Editar Unidade
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="clearfix"></div>
    <div class="box box-primary criar-aluno">
        <div class="box-body">
            <div class="clearfix"></div>
            <div class="row">
                {!! Form::model($unidade, ['route' => ['unidades.update', $unidade->id], 'method' => 'patch']) !!}

                @include('unidades.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
