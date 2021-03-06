@extends('layouts.app')

@section('title', 'Comunicados - Editar')

@section('content')
    <section class="content-header">
        <h1>
            Comunicados
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($comunicados, ['route' => ['comunicados.update', $comunicados->id], 'method' => 'patch']) !!}

                        @include('comunicados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
