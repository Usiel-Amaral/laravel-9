<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function index(Request $request){

        $search = $request->search;
        $users = User::where(function ($query) use ($search) {
            if ($search) {
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })->get();

        return view('users.index', compact('users'));
    }

    public function show($id){

        //$user = user::where('id', $id)->first();
        if (!$user = User::find($id))
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

        return redirect()->route('users.index'); //caso aconteça erro
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
