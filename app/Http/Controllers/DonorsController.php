<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateDonorsFormRequest;
use App\Models\Donors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DonorsController extends Controller
{

    protected $model;

    public function __construct(Donors $donor)
    {
        $this->model = $donor;
    }

    public function index(Request $request){

        $donors = $this->model
            ->getDonors(
                search: $request->search ?? ''
            );

        $donorsCount = $this->model::count();

        if(Auth::check()){
           return view('admin.donors.index', compact('donors', 'donorsCount'));
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function create()
    {
        if(Auth::check()){
            return view('admin.donors.create');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function store(StoreUpdateDonorsFormRequest $request)
    {

        $data = $request->all();

        //$data['password'] = bcrypt($request->password);

        $donor = $this->model->create($data);
        //$name = $donor['name'];


        //Alert::success("Parabéns $name!!", 'Você agora é um(a) doador de sangue!');
        Alert::success('Parabéns', 'Você agora é um(a) doador(a) de sangue!');
        return redirect()->back();

    }

    public function save(StoreUpdateDonorsFormRequest $request)
    {

        $data = $request->all();

        //$data['password'] = bcrypt($request->password);

        $this->model->create($data);
        //$name = $donor['name'];

        //Alert::success("Parabéns $name!!", 'Você agora é um(a) doador de sangue!');
        Alert::success('Parabéns', 'Cadastro realizado com sucesso!');
        return redirect("donors");

    }


    public function edit($id)
    {

        if(!$donor = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('donors.index');
            }
        }

        if(Auth::check()){
         return view('admin.donors.edit', compact('donor'));
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function update(StoreUpdateDonorsFormRequest $request, $id)
    {

        if(!$donor = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('donors.index');
            }
        }
        $data = $request->all();

        $donor->update($data);
        $name = $donor['name'];

        if(Auth::check()){
            return redirect()->route('donors.index')->with('success', "Doador $name atualizado com sucesso!");
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    public function destroy($id)
    {
        // delete doador
        if(!$donor = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('donors.index');
            }
        }

        if(Auth::check()){
            $donor->delete();

            return redirect()->route('donors.index')->with('success','Doador deletado com sucesso');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

}
