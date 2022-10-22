@extends('cliente.app')

@section('title','Mascotas del Cliente')

@section('content')

<?php $con = new mysqli('localhost','root','','prueba');
$datos = $con->query("SELECT * FROM mascotas");
?>


<h1 class=" my-10 text-3xl text-center font-bold">Mascotas de {{ auth()->user()->name}}</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-gray-600 text-white">
      <th class="w-1/8 py-4 ...">Nombre</th>
      <th class="w-1/8 py-4 ...">Fecha de Nacimiento</th>
      <th class="w-1/8 py-4 ...">color</th>
      <th class="w-20 py-4 ...">Sexo</th>
      <th class="w-1/8 py-4 ...">Raza</th>
      <th class="w-20 py-4 ...">Especie</th>
      <th class="w-1/8 py-4 ...">Imagen</th>
      <th class="w-25 py-4 ...">Ver</th>
    </tr>
  </thead>
  <tbody>

  @foreach($mascota as $mascotas)
  @if($mascotas->user_id == auth()->user()->id )
      <tr>



        <td class="p-3 text-center">{{$mascotas->nombre}}</td>
        <td class="p-3 text-center"> {{$mascotas->fnacimiento}}</td>
        <td class="p-3 text-center"> {{$mascotas->color}}</td>
        <td class="p-3 text-center">{{$mascotas->sexo}}</td>

  
        @foreach($raza as $razas)
       
       @if($mascotas->raza_id == $razas->id)
       <td class="p-3 text-center">{{$razas->nombre}}</td>
       @foreach($especie as $especies)
       
       @if($razas->especie_id == $especies->id)
       <td class="p-3 text-center">{{$especies->nombre}}</td>
       @endif
       
       @endforeach
       @endif
       
       @endforeach


        <td class="p-3 text-center"> 
          <img src="{{$mascotas->imagen}}" width="60%">    
      </td>



        
      <td class="p-1 text-center">
        <button class="bg-blue-500 text-white px-3 py-1 rounded-sm" onclick="window.location='{{ route('cliente.Tratamientos', $mascotas->id) }}'">
                <i class="fas fa-paw"> _ Historial Clinico</i></button>

            
          </td>
      </tr>
      @endif
      @endforeach

    
  </tbody>
</table>
</div>

@endsection