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

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    //ALDATU
    public function edit($id) {
      $user=User::find($id);
      return view('admin.edit', ['user' => $user]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    //ALDAKETAK GORDE
    public function update(Request $request, $id) {
      $user=User::find($id);
      $user->role = $request->input('rol');
      $user->save();

      $users = User::all();
      return view('admin.index', ['users' => $users]);
    }
}
