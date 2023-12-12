<?php

namespace App\Http\Controllers;

use App\Repositories\DueItensRepositoryEloquent;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\DueItensRepository;

/**
 * Class DueItensController.
 *
 * @package namespace App\Http\Controllers;
 */
class DueItensController extends Controller
{
    /**
     * @var DueItensRepository
     */
    protected $repository;

    /**
     * DueItensController constructor.
     *
     * @param DueItensRepository $repository
     */
    public function __construct(DueItensRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     * @throws RepositoryException
     */
    public function index(Request $request)
    {
        $this->repository->pushCriteria(new RequestCriteria($request));
        $dueItens = $this->repository->all();
        return view('dueItens.index', compact('dueItens'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dueIten = $this->repository->find($id);
        return view('dueItens.show', compact('dueIten'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dueIten = $this->repository->find($id);

        return view('dueItens.edit', compact('dueIten'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DueItensUpdateRequest $request
     * @param string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {
        try {

            $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'DueItens updated.',
            ];
            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }
}

