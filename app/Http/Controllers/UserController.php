<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request){

        $users = $this->model
            ->getUsers(
                search: $request->search ?? ''
            );

        //$avatar = Gravatar::get('fernandojrsud@hotmail.com');
        if(Auth::check()){
            return view('admin.users.index', compact('users'));
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function show($id)
    {
        //$user = User::where('id', $id)->first();
       if(!$user = $this->model->find($id)){

            if(Auth::check()){
                return redirect()->route('users.index');
            }
       }

      $avatar = Gravatar::get($user->email);

        if(Auth::check()){
            return view('admin.users.show', compact('user', 'avatar'));
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function create()
    {
        if(Auth::check()){
            return view('admin.users.create');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function store(StoreUpdateUserFormRequest $request)
    {

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = $this->model->create($data);
        $name = $user['name'];


        if(Auth::check()){
            return redirect()->route('users.index')->with('success', "Usuário $name cadastrado com sucesso!");
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function edit($id)
    {

        if(!$user = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('users.index');
            }
        }

        if(Auth::check()){
         return view('admin.users.edit', compact('user'));
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {

        if(!$user = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('users.index');
            }
        }
        $data = $request->only('name', 'email');

        if($request->password){
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);
        $name = $user['name'];

        if(Auth::check()){
            return redirect()->route('users.index')->with('success', "Usuário $name atualizado com sucesso!");
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function destroy($id)
    {
        // delete user
        if(!$user = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('users.index');
            }
        }

        if(Auth::check()){
            $user->delete();

            return redirect()->route('users.index')->with('success','Usuário deletado com sucesso');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

}
