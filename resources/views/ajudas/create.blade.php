@extends('layouts.app')

@section('title', 'Ajuda - Adicionar')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Edição da Ajuda</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('ajudas.index') !!}">Ajuda</a></li>
            <li class="active">Adicionar</li>
        </ol>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">

        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'ajudas.store']) !!}

                @include('ajudas.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
