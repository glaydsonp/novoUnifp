<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFormasPagamentoRequest;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\UpdateFormasPagamentoRequest;
use App\Repositories\FormasPagamentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Flash;
use Response;

class FormasPagamentoController extends AppBaseController
{
    /** @var  FormasPagamentoRepository */
    private $formasPagamentoRepository;

    public function __construct(FormasPagamentoRepository $formasPagamentoRepo)
    {
        $this->formasPagamentoRepository = $formasPagamentoRepo;
    }

    /**
     * Display a listing of the FormasPagamento.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        PermissionController::temPermissao('forma_pagamento.index');
        $formasPagamentos = $this->formasPagamentoRepository->all();

        return view('formas_pagamentos.index')
            ->with('formasPagamentos', $formasPagamentos);
    }

    /**
     * Show the form for creating a new FormasPagamento.
     *
     * @return Response
     */
    public function create($id)
    {
        PermissionController::temPermissao('forma_pagamento.update');
        $curso = DB::table('curso')->get()->where('id', $id)->first();
        return view('formas_pagamentos.create', ['curso' => $curso]);
    }

    /**
     * Store a newly created FormasPagamento in storage.
     *
     * @param CreateFormasPagamentoRequest $request
     *
     * @return Response
     */
    public function store(CreateFormasPagamentoRequest $request)
    {
        PermissionController::temPermissao('forma_pagamento.update');
        $input = $request->all();

        Arr::set($input, 'BrutoTotal', str_replace(',','.', Arr::get($input, 'BrutoTotal')));
        Arr::set($input, 'ParcelaBruta', str_replace(',','.', Arr::get($input, 'ParcelaBruta')));
        Arr::set($input, 'DescontoPontualidade', str_replace(',','.', Arr::get($input, 'DescontoPontualidade')));
        Arr::set($input, 'ParcelaDescontoPontualidade', str_replace(',','.', Arr::get($input, 'ParcelaDescontoPontualidade')));
        Arr::set($input, 'ValorTotalDesconto', str_replace(',','.', Arr::get($input, 'ValorTotalDesconto')));

        $formasPagamento = $this->formasPagamentoRepository->create($input);

        Flash::success('Forma de Pagamento adicionada com sucesso.');

        $idCurso = $request->idCurso ;

        return redirect(route('formasPagamentos.show', ["idCurso" => $idCurso]));
    }

    /**
     * Display the specified FormasPagamento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        PermissionController::temPermissao('forma_pagamento.index');
        // $formasPagamento = $this->formasPagamentoRepository->find($id);
        // $formasPagamento = DB::table('formas_pagamento')->get()->where(['idCurso' => $id], ['deleted_at' => null]);
        $formasPagamento = DB::table('formas_pagamento')->where([['idCurso', '=', $id],['deleted_at', '=', null],])->get();
        $curso = DB::table('curso')->get()->where('id', $id)->first();

        if (empty($formasPagamento)) {
            Flash::error('Forma de Pagamento não encontrada.');

            return redirect(route('formasPagamentos.index'));
        }

        return view('formas_pagamentos.show', ['formasPagamentos' => $formasPagamento, 'curso' => $curso]);
    }

    /**
     * Show the form for editing the specified FormasPagamento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        PermissionController::temPermissao('forma_pagamento.edit');
        $formasPagamento = $this->formasPagamentoRepository->find($id);

        if (empty($formasPagamento)) {
            Flash::error('Forma de Pagamento não encontrada.');

            return redirect(route('formasPagamentos.index'));
        }

        return view('formas_pagamentos.edit')->with('formasPagamento', $formasPagamento);
    }

    /**
     * Update the specified FormasPagamento in storage.
     *
     * @param int $id
     * @param UpdateFormasPagamentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormasPagamentoRequest $request)
    {
        PermissionController::temPermissao('forma_pagamento.edit');
        $formasPagamento = $this->formasPagamentoRepository->find($id);

        if (empty($formasPagamento)) {
            Flash::error('Forma de Pagamento não encontrada.');

            return redirect(route('formasPagamentos.index'));
        }

        $formasPagamento = $this->formasPagamentoRepository->update($request->all(), $id);

        Flash::success('Forma de Pagamento atualizada com sucesso.');

        return redirect(route('formasPagamentos.index'));
    }

    /**
     * Remove the specified FormasPagamento from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        PermissionController::temPermissao('forma_pagamento.delete');
        $formasPagamento = $this->formasPagamentoRepository->find($id);

        if (empty($formasPagamento)) {
            Flash::error('Forma de Pagamento não encontrada.');

            return redirect(route('formasPagamentos.index'));
        }

        $this->formasPagamentoRepository->delete($id);

        Flash::success('Forma de Pagamento deletada com sucesso.');

        return redirect(route('formasPagamentos.show', ["idCurso" => $formasPagamento->idCurso]));
    }
}
