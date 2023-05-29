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

        if(Auth::check()){
           return view('admin.donors.index', compact('donors'));
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
        Alert::success('Parabéns', 'Você agora é um(a) doador de sangue!');
        return redirect()->back();

    }

}
