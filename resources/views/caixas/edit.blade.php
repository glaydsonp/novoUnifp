@extends('layouts.app')

@section('title', 'Caixa do Dia - Editar')

@section('content')
    <section class="content-header">
            <h1 class="pull-left">Caixa do Dia</h1>
            <h1 class="pull-right">
                <ol class="breadcrumb breadcrumb-fp">
                    <li><a href="/home"><i class="fa fa-home"></i></a></li>
                    <li><a href="{!! route('caixas.index') !!}">Caixa do Dia</a></li>
                    <li class="active">Editar</li>
                </ol>
            </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary criar-unidade">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($caixa, ['route' => ['caixas.update', $caixa->id], 'method' => 'patch']) !!}

                        @include('caixas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
