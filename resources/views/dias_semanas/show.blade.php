@extends('layouts.app')

@section('title', 'Dias da Semana - Detalehs')

@section('content')
    <section class="content-header">
        <h1>
            Dias Semana
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary criar-unidade">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('dias_semanas.show_fields')
                    <a href="{!! route('diasSemanas.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
