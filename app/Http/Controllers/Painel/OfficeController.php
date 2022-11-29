<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\OfficeRequest;
use App\Models\Painel\Office;

class OfficeController extends Controller
{
  /**
   * Repository Office
   */
  private $repository;

  public function __construct(Office  $office)
  {
    $this->repository = $office;
  }

  /**
   * Index
   */
  public function index()
  {
    $offices = $this->repository->latest()->paginate();
    return view('painel.pages.office.index', compact('offices'));
  }

  /**
   * create
   */
  public function create()
  {
    return view('painel.pages.office.create');
  }

  /**
   * store
   */
  public function store(OfficeRequest $request)
  {
    $data = $request->except('_token');

    if ($this->repository->create($data)) {
      return redirect()->route('office.index')->with('success', 'Cargo cadastrado com sucesso');
    } else {
      return redirect()->route('office.index')->with('error', 'Falha ao cadastrar o cargo');
    }
  }

  /**
   * show
   */
  public function show($id)
  {
    $office = $this->repository->where('id', $id)->first();

    if (!$office) {
      return redirect()->back();
    }
    return view('painel.pages.office.show', compact('office'));
  }

  /**
   * edit
   */
  public function edit($id)
  {
    $office = $this->repository->where('id', $id)->first();

    if (!$office) {
      return redirect()->back();
    }

    return view('painel.pages.office.edit', compact('office'));
  }

  /**
   * update
   */
  public function update(OfficeRequest $request, $id)
  {
    $office = $this->repository->where('id', $id)->first();

    if (!$office) {
      return redirect()->back();
    }

    if ($office->update($request->except('_token', '_method'))) {
      return redirect()->route('office.index')->with('success', 'Cargo editado com sucesso');
    } else {
      return redirect()->route('office.index')->with('error', 'Falha ao editar o cargo');
    }
  }

  /**
   * excluir
   */
  public function excluir($id)
  {
    $office = Office::find($id);
    if ($office) {
      $office->delete();
      return redirect()->route('office.index')->with('danger', 'Cargo excluído com sucesso!');
    } else {
      return redirect()->route('office.index')->with('error', 'Falha ao excluir o cargo');
    }
  }
}
