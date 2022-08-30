<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    protected $model;

    public function __construct(User $user){
        $this->model = $user;
    }

    public function index(Request $request){

        $users = $this->model
                        ->getUsers(
                            search: $request->search ?? ''
                        );

        return view('users.index', compact('users'));
    }

    public function show($id){

        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        return view('users.show', compact('user'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request){
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        return redirect()->route('users.index'); // caso aconteça erro
        //return redirect()->route('users.show', $user->id);// ou este
    }

    public function edit($id){
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        dd($request->all());
    }

    public function destroy($id){

        if (!$user = User::find($id))
            return redirect()->route('users.index');

        $user->delete();

        return redirect()->route('users.index');
    }

}
