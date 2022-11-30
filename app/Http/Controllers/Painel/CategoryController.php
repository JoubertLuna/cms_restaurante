<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\CategoryRequest;
use App\Models\Painel\Category;

class CategoryController extends Controller
{
  /**
   * Repository Category
   */
  private $repository;

  public function __construct(Category  $category)
  {
    $this->repository = $category;
  }

  /**
   * Index
   */
  public function index()
  {
    $categories = $this->repository->latest()->paginate();
    return view('painel.pages.category.index', compact('categories'));
  }

  /**
   * create
   */
  public function create()
  {
    return view('painel.pages.category.create');
  }

  /**
   * store
   */
  public function store(CategoryRequest $request)
  {
    $data = $request->except('_token');

    if ($this->repository->create($data)) {
      return redirect()->route('category.index')->with('success', 'Categoria cadastrada com sucesso');
    } else {
      return redirect()->route('category.index')->with('error', 'Falha ao cadastrar a categoria');
    }
  }

  /**
   * show
   */
  public function show($id)
  {
    $category = $this->repository->where('id', $id)->first();

    if (!$category) {
      return redirect()->back();
    }
    return view('painel.pages.category.show', compact('category'));
  }

  /**
   * edit
   */
  public function edit($id)
  {
    $category = $this->repository->where('id', $id)->first();

    if (!$category) {
      return redirect()->back();
    }

    return view('painel.pages.category.edit', compact('category'));
  }

  /**
   * update
   */
  public function update(CategoryRequest $request, $id)
  {
    $category = $this->repository->where('id', $id)->first();

    if (!$category) {
      return redirect()->back();
    }

    if ($category->update($request->except('_token', '_method'))) {
      return redirect()->route('category.index')->with('success', 'Categoria editada com sucesso');
    } else {
      return redirect()->route('category.index')->with('error', 'Falha ao editar a categoria');
    }
  }

  /**
   * excluir
   */
  public function excluir($id)
  {
    $category = Category::find($id);
    if ($category) {
      $category->delete();
      return redirect()->route('category.index')->with('danger', 'Categoria excluída com sucesso!');
    } else {
      return redirect()->route('category.index')->with('error', 'Falha ao excluir a categoria');
    }
  }
}
