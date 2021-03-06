<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFuncionarioRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateFuncionarioRequest;
use App\Repositories\FuncionarioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Flash;
use Response;

class AniversarioController extends AppBaseController
{
    /** @var  FuncionarioRepository */
    private $funcionarioRepository;

    public function __construct(FuncionarioRepository $funcionarioRepo)
    {
        $this->funcionarioRepository = $funcionarioRepo;
    }

    /**
     * Display a listing of the Funcionario.
     *
     * @param Request $request
     *
     * @return Response
     */

    public function professores(Request $request)
    {
        PermissionController::temPermissao('aniversarios.index');
        $unidade = UnidadeController::getUnidade();
        $funcionarios = DB::table('funcionario')->where([['Cargo', '=', 'Professor'], ['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();

        return view('aniversarios.professores')
            ->with('funcionarios', $funcionarios);
    }

    public function professoresListar(Request $request)
    {
        PermissionController::temPermissao('aniversarios.index');
        $unidade = UnidadeController::getUnidade();
        $funcionarios = DB::table('funcionario')->where([
            ['idUnidade', '=', $unidade],
            ['Cargo', '=', 'Professor'],
            ['deleted_at', '=', null]
            ])->get();

        return view('aniversarios.listarProfessores')
            ->with('funcionarios', $funcionarios);
    }

    public function vendedoresListar(Request $request)
    {
        PermissionController::temPermissao('aniversarios.index');
        $unidade = UnidadeController::getUnidade();
        $funcionarios = DB::table('funcionario')->where([
            ['idUnidade', '=', $unidade],
            ['Cargo', '=', 'Vendedor'],
            ['deleted_at', '=', null]
            ])->get();

        return view('relatorios.listarVendedores')
            ->with('funcionarios', $funcionarios);
    }

    public function funcionarios(Request $request)
    {
        PermissionController::temPermissao('aniversarios.index');
        $unidade = UnidadeController::getUnidade();
        $funcionarios = DB::table('funcionario')->where([
            ['idUnidade', '=', $unidade],
            ['Cargo', '<>', 'Professor'],
            ['deleted_at', '=', null]
            ])->get();

        return view('aniversarios.funcionarios')
            ->with('funcionarios', $funcionarios);
    }

    /**
     * Show the form for creating a new Funcionario.
     *
     * @return Response
     */
    public function create()
    {
        PermissionController::temPermissao('aniversarios.update');
        return view('funcionarios.create');
    }

    /**
     * Store a newly created Funcionario in storage.
     *
     * @param CreateFuncionarioRequest $request
     *
     * @return Response
     */
    public function store(CreateFuncionarioRequest $request)
    {
        PermissionController::temPermissao('aniversarios.update');
        $input = $request->all();

        $funcionario = $this->funcionarioRepository->create($input);
        $unidade = UnidadeController::getUnidade();
        DB::table('funcionario')->where('id', $funcionario->id)->update(['idUnidade' => $unidade]);

        Flash::success('Funcionário salvo com sucesso.');

        return redirect(route('funcionarios.index'));
    }

    /**
     * Display the specified Funcionario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        PermissionController::temPermissao('aniversarios.index');
        $funcionario = $this->funcionarioRepository->find($id);

        if (empty($funcionario)) {
            Flash::error('Funcionário não encontrado.');

            return redirect(route('funcionarios.index'));
        }

        return view('funcionarios.show')->with('funcionario', $funcionario);
    }

    /**
     * Show the form for editing the specified Funcionario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        PermissionController::temPermissao('aniversarios.edit');
        $funcionario = $this->funcionarioRepository->find($id);

        if (empty($funcionario)) {
            Flash::error('Funcionário não encontrado.');

            return redirect(route('funcionarios.index'));
        }

        return view('funcionarios.edit')->with('funcionario', $funcionario);
    }

    /**
     * Update the specified Funcionario in storage.
     *
     * @param int $id
     * @param UpdateFuncionarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFuncionarioRequest $request)
    {
        PermissionController::temPermissao('aniversarios.edit');
        $funcionario = $this->funcionarioRepository->find($id);

        if (empty($funcionario)) {
            Flash::error('Funcionário não encontrado.');

            return redirect(route('funcionarios.index'));
        }

        $funcionario = $this->funcionarioRepository->update($request->all(), $id);

        Flash::success('Informações do funcionário atualizadas com sucesso.');

        return redirect(route('funcionarios.index'));
    }

    /**
     * Remove the specified Funcionario from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        PermissionController::temPermissao('aniversarios.delete');
        $funcionario = $this->funcionarioRepository->find($id);

        if (empty($funcionario)) {
            Flash::error('Funcionário não encontrado.');

            return redirect(route('funcionarios.index'));
        }

        $this->funcionarioRepository->delete($id);

        Flash::success('Funcionário deletado com sucesso.');

        return redirect(route('funcionarios.index'));
    }
}
