<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Painel\Office;
use App\Models\User;

class ChefController extends Controller
{
  /**
   * Repository Category
   */
  private $repository;
  private $office;

  public function __construct(User  $user, Office $office)
  {
    $this->repository = $user;
    $this->office = $office;
  }

  /**
   * Index
   */
  public function index()
  {
    $users = $this->repository->latest()->paginate();
    $offices = $this->office->latest()->paginate();
    return view('painel.pages.chef.index', compact('users', 'offices'));
  }

  /**
   * show
   */
  public function show($id)
  {
    $offices = Office::all();
    $user = $this->repository->where('id', $id)->first();

    if (!$user) {
      return redirect()->back();
    }
    return view('painel.pages.chef.show', compact('user', 'offices'));
  }
}
