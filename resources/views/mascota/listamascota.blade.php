@extends('layouts.app')

@section('title','Mascotas Registradas')

@section('content')



<nav class="flex py-5 bg-green-500 text-white border-2 border-white">
   <a href="{{route('admin.indexmascota')}}" class="mx-16 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>

    <ul class="px-16 ml-auto flex justify-center pt-1">
    <a href="{{route('admin.listamascota')}}" class="font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Mascotas</a>
    <a href="{{route('admin.crearmascota')}}" class="mx-2 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Registrar</a>
    </ul>
    
  </nav>
  <h1 class="text-3xl text-center font-bold">Lista de Mascotas</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-green-800 text-white">
      <th class="w-20 py-4 ...">ID</th>
      <th class="w-1/8 py-4 ...">Dueño</th>
      <th class="w-1/8 py-4 ...">Nombre</th>
      <th class="w-1/8 py-4 ...">Fecha de Nacimiento</th>
      <th class="w-1/8 py-4 ...">color</th>
      <th class="w-20 py-4 ...">Sexo</th>
      <th class="w-1/8 py-4 ...">Raza</th>
      <th class="w-20 py-4 ...">Especie</th>
      <th class="w-1/8 py-4 ...">Imagen</th>

      <th class="w-25 py-4 ...">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($mascota as $mascotas)
      <tr>

        <td class="py-3 px-6">{{$mascotas->id}}</td>

        @foreach($user as $users)
       
       @if($mascotas->user_id == $users->id)
       <td class="p-3 text-center">{{$users->name}}</td>
       @endif
       
       @endforeach


          



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
            
            <a href="{{route('admin.destroymascota', $mascotas->id)}}" class="text-black font-semibold border-2 border-red-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-red-500 hover:text-white">Borrar</a>
            <a href="{{route('admin.editmascota', $mascotas->id)}}" class="text-black font-semibold border-2 border-blue-500 py-3 px-8  pt-1 h-10 rounded-md hover:bg-blue-500 hover:text-white">Editar</a>
            
       
          </td>
      </tr>
 
      @endforeach
    
  </tbody>
</table>
</div>
@endsection
