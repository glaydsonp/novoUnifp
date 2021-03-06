{{-- {{ dd($dias[0]->DiasSemana) }} --}}
<div class="container formulario-padrao">
    <!-- Campo Nomeaula  -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('NomeAula', 'Nome da Aula:') !!}<span style="color: red">*</span>
        </p>
        <p class="col-sm-12 col-md-6">{!! Form::text('NomeAula', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Campo idCronograma -->
    <div class="row">
        <p class="col-xs-12 col-sm-4 col-md-4">{!! Form::label('idCronograma', 'Cronograma')
            !!}<span style="color: red">*</span></p>
        <p class="col-xs-12 col-sm-6 col-md-6 select-padrao">
            <select name="idCronograma" id="idCronograma" style="width: 50%">
                @foreach($cronogramas as $cronograma )
                <option value="{{ $cronograma->id }}">{{ $cronograma->Nome }}</option>
                @endforeach
            </select>
        </p>
    </div>

    <!-- Campo Dataaula  -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('DataAula', 'Data da Aula:') !!}<span style="color: red">*</span>
        </p>
        <div class="col-sm-12 col-md-6 input-group"
        style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
            {!! Form::date('DataAula', null, ['class' => 'form-control', 'id' =>
            'DataAula'])!!}
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
    </div>

    <!-- Campo Datatermino  -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('DataTermino', 'Data do Término:') !!}<span
                style="color: red">*</span></p>

        <div class="col-sm-12 col-md-6 input-group"
            style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
            {!! Form::date('DataTermino', null, ['class' => 'form-control', 'id' =>
            'DataTermino'])!!}
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
    </div>

    <!-- Campo Diassemana  -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('DiasSemana', 'Dias da Semana:') !!}<span
            style="color: red">*</span></p>
            {{-- <p class="col-sm-12 col-md-6">{!! Form::text('DiasSemana', null, ['class' => 'form-control']) !!}</p> --}}
            <p class="col-xs-12 col-sm-6 col-md-6 select-padrao">
                <select name="DiasSemana" id="DiasSemana" style="width: 50%">
                    {{-- @foreach($dias as $dia)
                    <option value="{{ $dia->id }}">
                        {{ $dia->DiasSemana }}
                    </option>
                    @endforeach --}}
                    @php
                        foreach ($dias as $obj) {
                            $str1 = str_replace(","," - ", $obj->DiasSemana);
                            $str2 = str_replace("\""," ", $str1);
                            $str3 = str_replace("]", "", $str2);
                            $str4 = str_replace("[", "", $str3);
                            echo $str4;
                            echo "<option value='$obj->DiasSemana'> $str4 </option>";
                        }
                    @endphp
                </select>
            </p>
        </div>

        <!-- Planejamento Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('Planejamento', 'Planejamento:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! Form::textarea('Planejamento', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Relatorioprofessor Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('RelatorioProfessor', 'Relatório do Professor:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! Form::textarea('RelatorioProfessor', null, ['class' => 'form-control']) !!}
        </p>
    </div>

    <!-- Submit Field -->
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i
                    class="fa fa-save"></i> Salvar
                Cronograma</button>
            <a href="{!! route('aulasCronogramas.index') !!}" style="margin-bottom: 1rem"
                class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
                Cancelar</a>
        </div>
    </div>
</div>
@section('scripts')
<script src="{{ url('js/datepicker.js') }}"></script>
<script src="{{ url('js/timepicker.js') }}"></script>
<script>
    //Timepicker
    $('.timepicker').timepicker({
        showInputs: false,
        timeFormat: 'HH:mm:ss'
    })

</script>
@endsection
