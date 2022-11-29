<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\TableRequest;
use App\Models\Painel\Table;

class TableController extends Controller
{
  /**
   * Repository Table
   */
  private $repository;

  public function __construct(Table  $table)
  {
    $this->repository = $table;
  }

  /**
   * Index
   */
  public function index()
  {
    $tables = $this->repository->latest()->paginate();
    return view('painel.pages.table.index', compact('tables'));
  }

  /**
   * create
   */
  public function create()
  {
    return view('painel.pages.table.create');
  }

  /**
   * store
   */
  public function store(TableRequest $request)
  {
    $data = $request->except('_token');

    if ($this->repository->create($data)) {
      return redirect()->route('table.index')->with('success', 'Mesa cadastrada com sucesso');
    } else {
      return redirect()->route('table.index')->with('error', 'Falha ao cadastrar a Mesa');
    }
  }

  /**
   * show
   */
  public function show($id)
  {
    $table = $this->repository->where('id', $id)->first();

    if (!$table) {
      return redirect()->back();
    }
    return view('painel.pages.table.show', compact('table'));
  }

  /**
   * edit
   */
  public function edit($id)
  {
    $table = $this->repository->where('id', $id)->first();

    if (!$table) {
      return redirect()->back();
    }

    return view('painel.pages.table.edit', compact('table'));
  }

  /**
   * update
   */
  public function update(TableRequest $request, $id)
  {
    $table = $this->repository->where('id', $id)->first();

    if (!$table) {
      return redirect()->back();
    }

    if ($table->update($request->except('_token', '_method'))) {
      return redirect()->route('table.index')->with('success', 'Mesa editada com sucesso');
    } else {
      return redirect()->route('table.index')->with('error', 'Falha ao editar a Mesa');
    }
  }

  /**
   * excluir
   */
  public function excluir($id)
  {
    $table = Table::find($id);
    if ($table) {
      $table->delete();
      return redirect()->route('table.index')->with('danger', 'Mesa excluída com sucesso!');
    } else {
      return redirect()->route('table.index')->with('error', 'Falha ao excluir a Mesa');
    }
  }
}
