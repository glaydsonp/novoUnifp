@extends('layouts.app')

@section('title', 'Centro de Custos')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Centro de Custos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('centroCustos.index') !!}">Centro de Custos</a></li>
            <li class="active">Lista</li>
        </ol>
    </h1>
</section>
<div class="clearfix"></div>
<a class="btn btn-success " style="margin-left: 1rem" href="{!! route('centroCustos.create') !!}"><i
        class="fa fa-plus"></i> Adicionar</a>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            @include('centro_custos.table')
        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection
