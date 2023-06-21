<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateWardsFormRequest;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WardsController extends Controller
{
    protected $model;

    public function __construct(Wards $ward)
    {
        $this->model = $ward;
    }

    public function index(Request $request){

        $wards = $this->model
        ->getWards(
            search: $request->search ?? ''
        );

        if(Auth::check()){
            return view('admin.wards.index', compact('wards'));
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function create()
    {
        if(Auth::check()){
            return view('admin.wards.create');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function store(StoreUpdateWardsFormRequest $request)
    {

        $data = $request->all();

        $this->model->create($data);

        if(Auth::check()){
            Alert::success('Tudo certo!', 'Unidade criada com sucesso!!');
            return redirect()->route('wards.index');
        }

        return redirect("login")->with('error', "Usuário não logado!");

    }

    public function edit($id)
    {

        if(!$ward = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('wards.index');
            }
        }

        if(Auth::check()){
         return view('admin.wards.edit', compact('ward'));
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function update(StoreUpdateWardsFormRequest $request, $id)
    {

        if(!$ward = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('wards.index');
            }
        }
        $data = $request->all();

        $ward->update($data);

        if(Auth::check()){
            return redirect()->route('wards.index')->with('success',  'Unidade atualizada com sucesso!');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function destroy($id)
    {
        // delete ala/ramo
        if(!$ward = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('wards.index');
            }
        }

        if(Auth::check()){
            $ward->delete();

            return redirect()->route('wards.index')->with('success','Unidade deletada com sucesso');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }
}
