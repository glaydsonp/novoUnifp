<div class="table-responsive">
        <table class="table display datatable-list">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data de Nascimento</th>
                <th>Perfil</th>
                <th>Unidade Escolar</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{!! $usuario->name !!}</td>
                <td>{!! $usuario->email !!}</td>
                <td>{!! $usuario->nascimento !!}</td>
                <td>
                    @switch($usuario->nivelAcesso)
                        @case(0)
                            {!! "Administrador" !!}
                            @break
                        @case(1)
                            {!! "Supervisor" !!}
                            @break
                        @case(2)
                            {!! "Gestor" !!}
                            @break
                        @case(3)
                            {!! "Secretaria" !!}
                            @break
                        @case(4)
                            {!! "Professor" !!}
                            @break
                        @case(5)
                            {!! "Comercial" !!}
                            @break
                        @case(6)
                            {!! "Atendimento" !!}
                            @break
                        @default
                            {!! "Sem perfil definido" !!}
                    @endswitch
                    {{-- {!! $usuario->nivelAcesso !!} --}}
                </td>
                {{-- Falta fazer switch case para unidades  --}}
                <td>{!! $usuario->unidadeEscolar !!}</td>
                <td>
                    {!! Form::open(['route' => ['usuarios.destroy', $usuario->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('usuarios.show', [$usuario->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('usuarios.edit', [$usuario->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>