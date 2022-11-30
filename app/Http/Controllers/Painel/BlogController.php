<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\BlogRequest;
use App\Models\Painel\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
  /**
   * Repository Blog
   */
  private $repository;

  public function __construct(Blog  $blog)
  {
    $this->repository = $blog;
  }

  /**
   * Index
   */
  public function index()
  {
    $users = User::all();
    $blogs = $this->repository->latest()->paginate();
    return view('painel.pages.blog.index', compact('blogs', 'users'));
  }

  /**
   * Create
   */
  public function create()
  {
    return view('painel.pages.blog.create');
  }

  /**
   * Store
   */
  public function store(BlogRequest $request)
  {
    if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
      $nome_imagem = $request->imagem->getClientOriginalName();
      $request->imagem->storeAs('blogs', $nome_imagem);
    } else {
      $nome_imagem = 'semblog.png';
    }

    $data = $request->except('_token');
    $data['imagem'] = $nome_imagem;
    $data['user_id'] = Auth::user()->id;

    if ($this->repository->create($data)) {
      return redirect()->route('blog.index')->with('success', 'Blog cadastrado com sucesso');
    } else {
      return redirect()->route('blog.index')->with('error', 'Falha ao cadastrar o Blog');
    }
  }

  /**
   * Show
   */
  public function show($id)
  {
    $users = User::all();
    $blog = $this->repository->where('id', $id)->first();

    if (!$blog) {
      return redirect()->back();
    }
    return view('painel.pages.blog.show', compact('blog', 'users'));
  }

  /**
   * Edit
   */
  public function edit($id)
  {
    $blog = $this->repository->where('id', $id)->first();

    if (!$blog) {
      return redirect()->back();
    }

    return view('painel.pages.blog.edit', compact('blog'));
  }

  /**
   * Update
   */
  public function update(BlogRequest $request, $id)
  {
    $blog = $this->repository->where('id', $id)->first();

    if (!$blog) {
      return redirect()->back();
    }

    //Update de Imagem
    if ($request->imagem) {
      if ($blog->imagem && Storage::exists($blog->imagem)) {
        Storage::delete($blog->imagem);
      }
      $nome_imagem_edit = $request->imagem->getClientOriginalName();
      $request->imagem->storeAs('blogs', $nome_imagem_edit);
    } elseif ($request->imagem === null) {
      $nome_imagem_edit = $blog['imagem'];
    } else {
      $nome_imagem_edit = 'semblog.png';
    }
    //Update de Imagem

    $blog->titulo = $request->input('titulo');
    $blog->descricao_1 = $request->input('descricao_1');
    $blog->descricao_2 = $request->input('descricao_2');
    $blog->descricao_3 = $request->input('descricao_3');
    $blog->imagem = @$nome_imagem_edit;
    $blog->palavras = $request->input('palavras');
    $blog['user_id'] = Auth::user()->id;
    $blog->update();

    if ($blog) {
      return redirect()->route('blog.index')->with('success', 'Blog editado com sucesso');
    } else {
      return redirect()->route('blog.index')->with('error', 'Falha ao editar o blog');
    }
  }

  /**
   * Excluir
   */
  public function excluir($id)
  {
    $blog = Blog::find($id);
    if ($blog) {
      $blog->delete();
      return redirect()->route('blog.index')->with('danger', 'Blog excluído com sucesso!');
    } else {
      return redirect()->route('blog.index')->with('error', 'Falha ao excluir o blog');
    }
  }
}
