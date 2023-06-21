<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateGranteesFormRequest;
use App\Models\BloodType;
use App\Models\Grantees;
use App\Models\Wards;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class GranteesController extends Controller
{
    protected $model;

    public function __construct(Grantees $grantee)
    {
        $this->model = $grantee;
    }

    public function index(Request $request){

        $grantees = $this->model
            ->getGrantees(
                search: $request->search ?? ''
            );

        $granteesCount = $this->model::count();

        if(Auth::check()){
           return view('admin.grantees.index', compact('grantees', 'granteesCount'));
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function create()
    {

        $wards = Wards::all();
        if(Auth::check()){
            return view('admin.grantees.create', compact('wards'));
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function store(StoreUpdateGranteesFormRequest $request)
    {

        $data = $request->all();

        $this->model->create($data);


        //Alert::success("Parabéns $name!!", 'Você agora é um(a) doador de sangue!');
        if(Auth::check()){
            Alert::success('Tudo certo!', 'Você agora está na nossa lista de espera!');
            return redirect()->route('grantees.index');
        }

        return redirect("login")->with('error', "Usuário não logado!");

    }

    public function save(StoreUpdateGranteesFormRequest $request)
    {

        $data = $request->all();

        //$data['password'] = bcrypt($request->password);

        $this->model->create($data);
        //$name = $donor['name'];

        //Alert::success("Parabéns $name!!", 'Você agora é um(a) doador de sangue!');
        Alert::success('Tudo certo', 'Você agora está na nossa lista de espera!');
        return redirect("grantees");

    }


    public function edit($id)
    {

        $wards = Wards::all();
        $types = BloodType::all();

        if(!$grantee = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('grantees.index');
            }
        }

        if(Auth::check()){
         return view('admin.grantees.edit', compact('grantee', 'wards', 'types'));
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function update(StoreUpdateGranteesFormRequest $request, $id)
    {

        if(!$grantee = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('grantees.index');
            }
        }
        $data = $request->all();

        $grantee->update($data);
        $name = $grantee['name'];

        if(Auth::check()){
            return redirect()->route('grantees.index')->with('success', "Donatário $name atualizado com sucesso!");
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function destroy($id)
    {
        // delete doador
        if(!$grantee = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('grantees.index');
            }
        }

        if(Auth::check()){
            $grantee->delete();

            return redirect()->route('grantees.index')->with('success','Donatário deletado com sucesso');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function help(){
        return view('help');
    }

}
