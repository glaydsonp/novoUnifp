@extends('layouts.app')

@section('title', 'Cursos - Editar')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Cursos</h1>
        <h1 class="pull-right">
            <ol class="breadcrumb breadcrumb-fp">
                <li><a href="/home"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! route('cursos.index') !!}">Cursos</a></li>
                <li class="active">Editar</li>
            </ol>
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary criar-unidade">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($curso, ['route' => ['cursos.update', $curso->id], 'method' => 'patch']) !!}

                        @include('cursos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
