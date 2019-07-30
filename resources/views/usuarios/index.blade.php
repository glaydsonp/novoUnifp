@extends('layouts.app')

@section('content')
    <section class="content-header">
        {{-- <h1 class="pull-left">Usuarios</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('usuarios.create') !!}">Add New</a>
        </h1> --}}

        <h1 class="pull-left">Lista de Usuários</h1>
        <a class="btn btn-success pull-right" style="margin-left: 1rem"
            href="{!! route('usuarios.create') !!}"><i class="fa fa-plus"></i> Adicionar</a>
        <h1 class="pull-right">
            <ol class="breadcrumb breadcrumb-fp">
                <li><a href="/home"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! route('usuarios.index') !!}">Usuários</a></li>
                <li class="active">Lista</li>
            </ol>
        </h1>
        <div class="clearfix"></div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary criar-unidade">
            <div class="box-body">
                    @include('usuarios.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
