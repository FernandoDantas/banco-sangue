<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateStatesFormRequest;
use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StateController extends Controller
{
    protected $model;

    public function __construct(States $state)
    {
        $this->model = $state;
    }

    public function index(Request $request){

        $states = $this->model
        ->getStates(
            search: $request->search ?? ''
        );

        if(Auth::check()){
            return view('admin.states.index', compact('states'));
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function create()
    {
        if(Auth::check()){
            return view('admin.states.create');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function store(StoreUpdateStatesFormRequest $request)
    {

        $data = $request->all();

        $this->model->create($data);

        if(Auth::check()){
            Alert::success('Tudo certo!', 'Estado criado com sucesso!!');
            return redirect()->route('states.index');
        }

        return redirect("login")->with('error', "Usuário não logado!");

    }

    public function edit($id)
    {

        if(!$state = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('states.index');
            }
        }

        if(Auth::check()){
         return view('admin.states.edit', compact('state'));
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function update(StoreUpdateStatesFormRequest $request, $id)
    {

        if(!$state = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('states.index');
            }
        }
        $data = $request->all();

        $state->update($data);

        if(Auth::check()){
            return redirect()->route('states.index')->with('success',  'Estado atualizado com sucesso!');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function destroy($id)
    {
        // delete doador
        if(!$state = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('states.index');
            }
        }

        if(Auth::check()){
            $state->delete();

            return redirect()->route('states.index')->with('success','Estado deletado com sucesso');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }


}
