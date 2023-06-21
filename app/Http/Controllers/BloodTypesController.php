<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateBloodTypesFormRequest;
use App\Models\BloodType;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class BloodTypesController extends Controller
{
    protected $model;

    public function __construct(BloodType $bloodType)
    {
        $this->model = $bloodType;
    }

    public function index(Request $request){

        $bloodTypes = $this->model
        ->getBloodTypes(
            search: $request->search ?? ''
        );

        if(Auth::check()){
            return view('admin.bloodTypes.index', compact('bloodTypes'));
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function create()
    {
        if(Auth::check()){
            return view('admin.bloodTypes.create');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function store(StoreUpdateBloodTypesFormRequest $request)
    {

        $data = $request->all();

        $this->model->create($data);

        if(Auth::check()){
            Alert::success('Tudo certo!', 'Tipo sanguíneo criado com sucesso!!');
            return redirect()->route('types.index');
        }

        return redirect("login")->with('error', "Usuário não logado!");

    }

    public function edit($id)
    {

        if(!$bloodType = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('types.index');
            }
        }

        if(Auth::check()){
         return view('admin.bloodTypes.edit', compact('bloodType'));
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function update(StoreUpdateBloodTypesFormRequest $request, $id)
    {

        if(!$bloodType = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('bloodTypes.index');
            }
        }
        $data = $request->all();

        $bloodType->update($data);

        if(Auth::check()){
            return redirect()->route('types.index')->with('success',  'Tipo sanguíneo atualizado com sucesso!');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function destroy($id)
    {
        // delete doador
        if(!$bloodType = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('types.index');
            }
        }

        if(Auth::check()){
            $bloodType->delete();

            return redirect()->route('types.index')->with('success','Tipo sanguíneo deletado com sucesso');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }
}
