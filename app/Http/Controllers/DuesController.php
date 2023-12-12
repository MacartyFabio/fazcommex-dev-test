<?php

namespace App\Http\Controllers;

use App\Models\Dues;
use App\Repositories\DueItensRepositoryEloquent;
use App\Repositories\DuesRepositoryEloquent;
use Illuminate\Http\Client\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\DuesCreateRequest;
use App\Http\Requests\DuesUpdateRequest;
use App\Repositories\DuesRepository;
use App\Validators\DuesValidator;

/**
 * Class DuesController.
 *
 * @package namespace App\Http\Controllers;
 */
class DuesController extends Controller
{

    private DuesRepositoryEloquent $duesRepository;
    private DueItensRepositoryEloquent $duesItensRepository;

    /**
     * DuesController constructor.
     *
     * @param DuesRepository $repository
     * @param DuesValidator $validator
     */
    public function __construct(DuesRepositoryEloquent $duesRepository)
    {
        $this->duesRepository = $duesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     * @throws RepositoryException
     */
    public function index(Request $request)
    {
        $this->duesRepository->pushCriteria(new RequestCriteria($request));
        $dues = $this->duesRepository->all();
        return Inertia::render('Dues', compact('dues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DuesCreateRequest $request
     *
     * @return RedirectResponse
     *
     */
    public function store(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:json|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('file');
        $duesData = json_decode(file_get_contents($file->getPathname()), true);
        if (empty($duesData) && !is_array($duesData)) {
            return redirect()->back()->withErrors(['error' => 'formato inválido ou arquivo vazio.'])->withInput();
        }
        try {

            $this->duesRepository->save($duesData);

            return redirect()->route('dues')->with('success', 'DU-Es importados com sucesso.');
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Inertia\Response
     */
    public function edit(int $id): \Inertia\Response
    {
        $dues = $this->duesRepository->with(['dueItens'])->find($id);
        return Inertia::render('DuesEdit', compact('dues'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DuesUpdateRequest $request
     * @param integer $id
     *
     * @return RedirectResponse
     *
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        try {
            $request->validate([
                'informacoes_complementares' => 'required'
            ]);
            $this->duesRepository->update($request->only('informacoes_complementares'), $id);
            $response = [
                'message' => 'Dues updated.',
            ];

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function import(): \Inertia\Response
    {
        return Inertia::render('DuesImport');
    }

}
