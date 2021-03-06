@extends('layouts.app')

@section('title', 'Frequência - Adicionar')

@section('content')
    <section class="content-header">
        <h1>
            Frequencia
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'frequencias.store']) !!}

                        @include('frequencias.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
