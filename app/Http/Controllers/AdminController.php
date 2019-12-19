<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller {
  public function __construct() {
    $this->middleware(['admin']);
  }
    public function index() {
      $users=User::all();
      return view('admin.index', ['users' => $users]);
    }
}
