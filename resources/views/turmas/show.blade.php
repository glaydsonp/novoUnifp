@extends('layouts.app')

@section('title', 'Turmas - Detalhes')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Turmas Ativas</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('turmas.index') !!}">Turmas Ativas</a></li>
            <li class="active">Detalhes</li>
        </ol>
    </h1>
</section>
<div class="content">
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row" style="padding-left: 20px">
                @include('turmas.show_fields')
                <div class="col-md-3"></div>
                <a href="{!! route('turmas.index') !!}" class="btn btn-default">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
