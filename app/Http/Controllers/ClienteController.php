<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\mascota;
use App\Models\servicio;
use App\Models\User;
use App\Models\reserva;
use App\Models\ficha;
use App\Models\bitacora;
use App\Models\raza;
use App\Models\especie;
use App\Models\tratamiento;
use App\Models\presentacion;
use App\Models\producto;
use App\Models\marca;
use App\Models\periodo;

class ClienteController extends Controller{

    public function index(){
        return view('cliente.index');
    }

    public function Mascotas(){
        $mascota = mascota::all();
        $raza = raza::all();
        $especie = especie::all(); 
        return view('cliente.mascotas',compact('mascota','especie','raza'));
    }

    public function Citas(){
        $mascota = mascota::all();
        $reserva = reserva::all();
        $periodo = periodo::all();
        $servicio = servicio::all();
        return view('cliente.citas',compact('mascota','reserva','periodo','servicio'));
    }

    public function Servicios(){
        $servicio = servicio::all();
        return view('cliente.servicios', compact('servicio'));
    }

    public function Categorias(){
        $categoria = categoria::all();
        return view('cliente.productos', compact('categoria'));
    }

    public function Productos($id){
        $categoria = categoria::find($id);
        $cate = categoria::all();
        $producto = producto::all();
        $presentacion = presentacion::all();
        $marca = marca::all();
        return view('cliente.productoscategoria',  compact('categoria','cate','producto','presentacion','marca'));
    }

    public function Tratamientos($id){
        $mascota = mascota::find($id);
        $tratamiento = tratamiento::all();
        return view('cliente.tratamientos', compact('mascota','tratamiento'));
    }

    public function Perfil(){
        $user = User::find(auth()->user()->id);
        return view('cliente.perfil', compact('user'));
    }

    public function updatePerfil(Request $request){
        $this->validate(request(),['carnet'=>'required','name'=>'required','email'=>'required|email']);
        $user = User::find(auth()->user()->id);
        $user->carnet = $request->carnet;
        $user->name = $request->name;
        $user->email = $request->email;

        $bitacora = new bitacora();
        $bitacora->name = 'cliente';
        $bitacora->causer_id = $user->id;
        $bitacora->long_name = 'cliente';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $user->id;
        $bitacora->save();


        $user->save();
        return redirect()->route('cliente.Perfil');
    }

    public function Contraseña(){
        return view('cliente.contraseña');
    }

    public function updateContraseña(Request $request){
        $this->validate(request(),['password'=>'required|confirmed',]);
        $user = User::find(auth()->user()->id);
            $user->password = $request->password;

            $bitacora = new bitacora();
            $bitacora->name = 'cliente';
            $bitacora->causer_id = $user->id;
            $bitacora->long_name = 'cliente';
            $bitacora->descripcion = 'editó';
            $bitacora->subject_id = $user->id;
            $bitacora->save();

            $user->save();
        return redirect()->route('cliente.Perfil');
    }

    
    public function Reservas(){
        $mascota = mascota::all();
        $periodo = periodo::all();
        $servicio = servicio::all();
        return view('cliente.reserva',compact('mascota','periodo','servicio'));
    }

    public function registarReserva(Request $request){
        $this->validate(request(),['mascota_id'=>'required','servicio_id'=>'required','fecha'=>'required','periodo_id'=>'required']);
        $servicio = servicio::all();
        $mascota = mascota::all();
        $periodo = periodo::all();

        $user = User::find(auth()->user()->id);
        $reservat= new reserva();
        $reservat->fecha = $request->fecha;
        $reservat->mascota_id = $request->mascota_id;
        $reservat->servicio_id = $request->servicio_id;

        $bitacora = new bitacora();
        $bitacora->name = 'cliente';
        $bitacora->causer_id = $user->id;
        $bitacora->long_name = 'reserva';
        $bitacora->descripcion = 'registró';
        $bitacora->subject_id = $user->id;
        $bitacora->save();


        $reservat->save();

        $ficha= new ficha();
        $ficha->fecha = $request->fecha;
        $ficha->periodo_id = $request->periodo_id;
        $ficha->reserva_id = $reservat->id;
        $ficha->save();
        return view('cliente.reserva',compact('servicio','mascota','periodo'));
    }

}
