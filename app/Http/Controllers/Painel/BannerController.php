<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\BannerRequest;
use App\Models\Painel\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
  /**
   * Repository Banner
   */
  private $repository;

  public function __construct(Banner  $banner)
  {
    $this->repository = $banner;
  }

  /**
   * Index
   */
  public function index()
  {
    $banners = $this->repository->latest()->paginate();
    return view('painel.pages.banner.index', compact('banners'));
  }

  /**
   * Create
   */
  public function create()
  {
    return view('painel.pages.banner.create');
  }

  /**
   * Store
   */
  public function store(BannerRequest $request)
  {
    if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
      $nome_imagem = $request->imagem->getClientOriginalName();
      $request->imagem->storeAs('banners', $nome_imagem);
    } else {
      $nome_imagem = 'sembanner.png';
    }

    $data = $request->except('_token');
    $data['imagem'] = $nome_imagem;

    if ($this->repository->create($data)) {
      return redirect()->route('banner.index')->with('success', 'Banner cadastrado com sucesso');
    } else {
      return redirect()->route('banner.index')->with('error', 'Falha ao cadastrar o banner');
    }
  }

  /**
   * Show
   */
  public function show($id)
  {
    $banner = $this->repository->where('id', $id)->first();

    if (!$banner) {
      return redirect()->back();
    }
    return view('painel.pages.banner.show', compact('banner'));
  }

  /**
   * Edit
   */
  public function edit($id)
  {
    $banner = $this->repository->where('id', $id)->first();

    if (!$banner) {
      return redirect()->back();
    }

    return view('painel.pages.banner.edit', compact('banner'));
  }

  /**
   * Update
   */
  public function update(BannerRequest $request, $id)
  {
    $banner = $this->repository->where('id', $id)->first();

    if (!$banner) {
      return redirect()->back();
    }

    //Update de Imagem
    if ($request->imagem) {
      if ($banner->imagem && Storage::exists($banner->imagem)) {
        Storage::delete($banner->imagem);
      }
      $nome_imagem_edit = $request->imagem->getClientOriginalName();
      $request->imagem->storeAs('banners', $nome_imagem_edit);
    } elseif ($request->imagem === null) {
      $nome_imagem_edit = $banner['imagem'];
    } else {
      $nome_imagem_edit = 'sembanner.png';
    }
    //Update de Imagem

    $banner->imagem = @$nome_imagem_edit;
    $banner->titulo = $request->input('titulo');
    $banner->subtitulo = $request->input('subtitulo');
    $banner->descricao = $request->input('descricao');
    $banner->link = $request->input('link');
    $banner->update();

    if ($banner) {
      return redirect()->route('banner.index')->with('success', 'Banner editado com sucesso');
    } else {
      return redirect()->route('banner.index')->with('error', 'Falha ao editar o banner');
    }
  }

  /**
   * Excluir
   */
  public function excluir($id)
  {
    $banner = Banner::find($id);
    if ($banner) {
      $banner->delete();
      return redirect()->route('banner.index')->with('danger', 'Banner excluído com sucesso!');
    } else {
      return redirect()->route('banner.index')->with('error', 'Falha ao excluir o banner');
    }
  }
}
