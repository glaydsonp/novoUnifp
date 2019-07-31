@extends('layouts.app')

@section('content')
    <section class="content-header">
            <h1 class="pull-left">Dias de Aula</h1>
            <h1 class="pull-right">
                <ol class="breadcrumb breadcrumb-fp">
                    <li><a href="/home"><i class="fa fa-home"></i></a></li>
                    <li><a href="{!! route('diasSemanas.index') !!}">Dias de Aula</a></li>
                    <li class="active">Editar</li>
                </ol>
            </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary criar-unidade">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($diasSemana, ['route' => ['diasSemanas.update', $diasSemana->id], 'method' => 'patch']) !!}

                        @include('dias_semanas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
