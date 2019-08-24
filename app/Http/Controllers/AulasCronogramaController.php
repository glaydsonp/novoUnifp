<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateAulasCronogramaRequest;
use App\Http\Requests\UpdateAulasCronogramaRequest;
use App\Repositories\AulasCronogramaRepository;
use Illuminate\Support\Arr;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AulasCronogramaController extends AppBaseController
{
    /** @var  AulasCronogramaRepository */
    private $aulasCronogramaRepository;

    public function __construct(AulasCronogramaRepository $aulasCronogramaRepo)
    {
        $this->aulasCronogramaRepository = $aulasCronogramaRepo;
    }

    /**
     * Display a listing of the AulasCronograma.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $aulasCronogramas = $this->aulasCronogramaRepository->all();

        return view('aulas_cronogramas.index')
            ->with('aulasCronogramas', $aulasCronogramas);
    }

    /**
     * Show the form for creating a new AulasCronograma.
     *
     * @return Response
     */
    public function create()
    {
        $cronogramas = DB::table('cronograma')->get() ;
        $dias = DB::table('dias_semana')->get();
        return view('aulas_cronogramas.create', ['cronogramas' => $cronogramas, 'dias' => $dias ]);
    }

    /**
     * Store a newly created AulasCronograma in storage.
     *
     * @param CreateAulasCronogramaRequest $request
     *
     * @return Response
     */
    public function store(CreateAulasCronogramaRequest $request)
    {
        $input = $request->all();

        $aulasCronograma = $this->aulasCronogramaRepository->create($input);
        // foreach($input as $obj){
            // dd($request->idCronograma);
        //     $idCronograma = $obj->idCronograma;
        // }
        $aulasCronogramas = $this->aulasCronogramaRepository->all()->where('idCronograma', $request->idCronograma);
        dd($aulasCronogramas);
        Flash::success('Cronograma criado com sucesso.');

        return redirect(route('aulasCronogramas.show/$request->idCronograma', ['aulasCronogramas' => $aulasCronogramas]));
    }

    /**
     * Display the specified AulasCronograma.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $aulasCronograma = $this->aulasCronogramaRepository->all()->where('idCronograma', $id);

        if (empty($aulasCronograma)) {
            Flash::error('Cronograma não encontrado.');

            return redirect(route('aulasCronogramas.index'));
        }

        return view('aulas_cronogramas.index')->with('aulasCronogramas', $aulasCronograma);
    }

    /**
     * Show the form for editing the specified AulasCronograma.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $aulasCronograma = $this->aulasCronogramaRepository->find($id);
        $cronogramas = DB::table('cronograma')->get() ;

        if (empty($aulasCronograma)) {
            Flash::error('Cronograma não encontrado.');

            return redirect(route('aulasCronogramas.index'));
        }

        return view('aulas_cronogramas.edit', ['aulasCronograma' => $aulasCronograma, 'cronogramas' => $cronogramas]);
    }

    /**
     * Update the specified AulasCronograma in storage.
     *
     * @param int $id
     * @param UpdateAulasCronogramaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAulasCronogramaRequest $request)
    {
        $aulasCronograma = $this->aulasCronogramaRepository->find($id);

        if (empty($aulasCronograma)) {
            Flash::error('Cronograma não encontrado.');

            return redirect(route('aulasCronogramas.index'));
        }

        $aulasCronograma = $this->aulasCronogramaRepository->update($request->all(), $id);

        Flash::success('Cronograma atualizado com sucesso.');

        return redirect(route('aulasCronogramas.index'));
    }

    /**
     * Remove the specified AulasCronograma from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $aulasCronograma = $this->aulasCronogramaRepository->find($id);

        if (empty($aulasCronograma)) {
            Flash::error('Cronograma não encontrado.');

            return redirect(route('aulasCronogramas.index'));
        }

        $this->aulasCronogramaRepository->delete($id);

        Flash::success('Cronograma deletado com sucesso.');

        return redirect(route('aulasCronogramas.index'));
    }
}
