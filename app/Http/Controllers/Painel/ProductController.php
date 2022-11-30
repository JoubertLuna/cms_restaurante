<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\ProductRequest;
use App\Models\Painel\Category;
use App\Models\Painel\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
  /**
   * Repository Product
   */
  private $repository;

  public function __construct(Product  $product)
  {
    $this->repository = $product;
  }

  /**
   * Index
   */
  public function index()
  {
    $products = $this->repository->latest()->paginate();
    return view('painel.pages.product.index', compact('products'));
  }

  /**
   * Create
   */
  public function create()
  {
    $categories = Category::all();
    return view('painel.pages.product.create', compact('categories'));
  }

  /**
   * Store
   */
  public function store(ProductRequest $request)
  {
    if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
      $nome_imagem = $request->imagem->getClientOriginalName();
      $request->imagem->storeAs('products', $nome_imagem);
    } else {
      $nome_imagem = 'semproduto.png';
    }

    $data = $request->except('_token');
    $data['imagem'] = $nome_imagem;

    if ($this->repository->create($data)) {
      return redirect()->route('product.index')->with('success', 'Produto cadastrado com sucesso');
    } else {
      return redirect()->route('product.index')->with('error', 'Falha ao cadastrar o Produto');
    }
  }

  /**
   * Show
   */
  public function show($id)
  {
    $categories = Category::all();
    $product = $this->repository->where('id', $id)->first();

    if (!$product) {
      return redirect()->back();
    }
    return view('painel.pages.product.show', compact('product', 'categories'));
  }

  /**
   * Edit
   */
  public function edit($id)
  {
    $categories = Category::all();
    $product = $this->repository->where('id', $id)->first();

    if (!$product) {
      return redirect()->back();
    }

    return view('painel.pages.product.edit', compact('product', 'categories'));
  }

  /**
   * Update
   */
  public function update(ProductRequest $request, $id)
  {
    $product = $this->repository->where('id', $id)->first();

    if (!$product) {
      return redirect()->back();
    }

    //Update de Imagem
    if ($request->imagem) {
      if ($product->imagem && Storage::exists($product->imagem)) {
        Storage::delete($product->imagem);
      }
      $nome_imagem_edit = $request->imagem->getClientOriginalName();
      $request->imagem->storeAs('products', $nome_imagem_edit);
    } elseif ($request->imagem === null) {
      $nome_imagem_edit = $product['imagem'];
    } else {
      $nome_imagem_edit = 'semproduto.png';
    }
    //Update de Imagem

    $product->produto = $request->input('produto');
    $product->category_id = $request->input('category_id');
    $product->preco = $request->input('preco');
    $product->eh_produto = $request->input('eh_produto');
    $product->eh_insumo = $request->input('eh_insumo');
    $product->ativo = $request->input('ativo');
    $product->imagem = @$nome_imagem_edit;
    $product->update();

    if ($product) {
      return redirect()->route('product.index')->with('success', 'Produto editado com sucesso');
    } else {
      return redirect()->route('product.index')->with('error', 'Falha ao editar o Produto');
    }
  }

  /**
   * Excluir
   */
  public function excluir($id)
  {
    $product = Product::find($id);
    if ($product) {
      $product->delete();
      return redirect()->route('product.index')->with('danger', 'Produto excluído com sucesso!');
    } else {
      return redirect()->route('product.index')->with('error', 'Falha ao excluir o produto');
    }
  }
}
