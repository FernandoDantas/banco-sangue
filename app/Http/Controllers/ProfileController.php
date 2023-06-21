<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProfileFormRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{

    protected $model;

    public function __construct(Profile $profile){
        $this->model = $profile;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $profiles = $this->model
        ->getProfiles(
            search: $request->search ?? ''
        );


        if(Auth::check()){
            return view('admin.profiles.index', compact('profiles'));
         }

         return redirect("login")->with('error', "Usuário não logado!");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            return view('admin.profiles.create');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfileFormRequest $request)
    {
        $data = $request->all();

        $this->model->create($data);

        if(Auth::check()){
            Alert::success('Tudo certo!', 'Perfil criado com sucesso!!');
            return redirect()->route('profiles.index');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$profile = $this->model->find($id)){
            return redirect()->back();
        }

        if(Auth::check()){
            return view('admin.profiles.show', compact('profile'));
        }

        return redirect("login")->with('error', "Usuário não logado!");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$profile = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('profiles.index');
            }
        }

        if(Auth::check()){
         return view('admin.profiles.edit', compact('profile'));
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProfileFormRequest $request, $id)
    {
        if(!$profile = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('profiles.index');
            }
        }
        $data = $request->all();

        $profile->update($data);

        if(Auth::check()){
            return redirect()->route('profiles.index')->with('success',  'Perfil atualizado com sucesso!');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$profile = $this->model->find($id)){
            if(Auth::check()){
                return redirect()->route('profiles.index');
            }
        }

        if(Auth::check()){
            $profile->delete();

            return redirect()->route('profiles.index')->with('success','Perfil deletado com sucesso');
        }

        return redirect("login")->with('error', "Usuário não logado!");
    }
}
