<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\ContactRequest;
use App\Models\Painel\Contact;

class ContactController extends Controller
{
  /**
   * Repository Contact
   */
  private $repository;

  public function __construct(Contact  $contact)
  {
    $this->repository = $contact;
  }

  /**
   * Index
   */
  public function index()
  {
    $contacts = $this->repository->latest()->paginate();
    return view('painel.pages.contact.index', compact('contacts'));
  }

  /**
   * create
   */
  public function create()
  {
    return view('painel.pages.contact.create');
  }

  /**
   * store
   */
  public function store(ContactRequest $request)
  {
    $data = $request->except('_token');

    if ($this->repository->create($data)) {
      return redirect()->route('contact.index')->with('success', 'Fornecedor / Entregador cadastrado com sucesso');
    } else {
      return redirect()->route('contact.index')->with('error', 'Falha ao cadastrar o fornecedor / entregador');
    }
  }

  /**
   * show
   */
  public function show($id)
  {
    $contact = $this->repository->where('id', $id)->first();

    if (!$contact) {
      return redirect()->back();
    }
    return view('painel.pages.contact.show', compact('contact'));
  }

  /**
   * edit
   */
  public function edit($id)
  {
    $contact = $this->repository->where('id', $id)->first();

    if (!$contact) {
      return redirect()->back();
    }

    return view('painel.pages.contact.edit', compact('contact'));
  }

  /**
   * update
   */
  public function update(ContactRequest $request, $id)
  {
    $contact = $this->repository->where('id', $id)->first();

    if (!$contact) {
      return redirect()->back();
    }

    if ($contact->update($request->except('_token', '_method'))) {
      return redirect()->route('contact.index')->with('success', 'Fornecedor / Entregador editado com sucesso');
    } else {
      return redirect()->route('contact.index')->with('error', 'Falha ao editar o fornecedor / entregador');
    }
  }

  /**
   * excluir
   */
  public function excluir($id)
  {
    $contact = Contact::find($id);
    if ($contact) {
      $contact->delete();
      return redirect()->route('contact.index')->with('danger', 'Fornecedor / Entregador excluído com sucesso!');
    } else {
      return redirect()->route('contact.index')->with('error', 'Falha ao excluir o fornecedor / entregador');
    }
  }
}
