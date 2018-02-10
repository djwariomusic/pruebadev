<?php

namespace App\Http\Controllers;

Use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      /** Se recibe todos los parametros a traves de la Clase Input::all() */
      $input = Input::all();
      $ccvalid = $input['cc'];
      $emailvalid = $input['email'];
      $result1 = User::where('cc','=',$ccvalid)->get();
      $result2 = User::where('email','=',$emailvalid)->get();
      /** Se captura el email y cedula para validación */

      /** Si estan vacios se procede a crear el Usuario */
      if($result1->isEmpty() && $result2->isEmpty()){
        $user = new User();
        $user->name = $input['name'];
        $user->lastname = $input['lastname'];
        $user->cc = $input['cc'];
        $user->department = $input['depa_nac'];
        $user->city = $input['ciud_nac'];
        $user->cellphone = $input['cellphone'];
        $user->email = $input['email'];
        $user->accepthd = $input['accepthd'];
        $user->password = bcrypt($input['password']);
        $user->save();
        $alerts="ok";
        return view('welcome',['alerts'=>$alerts]);
        }
      /** Si no mensaje de error retornando este al Index */
      else{
        $alerts="error";
        return view('welcome',['alerts'=>$alerts]);
      }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function winner(Request $request)
    {
      /** Se realiza un conteo de todos los usuarios registrados */
      $count = User::count();

      /** Si la cantidad de Usuarios es menor a 5 retorna notificación */
      if($count<5){
        $result="falta";
        return view('welcome',['result'=>$result]);
      }
      /** Si no elige un usuarios Aleatorio retornado unico registro*/
      else{
        $winner = User::inRandomOrder()->get()->first();
        $cc=$winner->cc;
        $result="listo";
        return view('welcome',['result'=>$result,'cc'=>$cc,'winner'=>$winner]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
