@extends('layouts.app')

@section('title','Tratamientos Registrados')

@section('content')


<nav class="flex py-5 bg-green-500 text-white border-2 border-white">
   <a href="{{route('admin.indexservicio')}}" class="mx-16 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>

    <ul class="px-16 ml-auto flex justify-center pt-1">
    <a href="" class="font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Tratamientos</a>
    <a href="{{route('admin.creartratamiento')}}" class="mx-2 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Registrar</a>
    </ul>
    
  </nav>
  <h1 class="text-3xl text-center font-bold">Lista de Tratamientos</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-green-800 text-white">
      <th class="w-20 py-4 ...">ID</th>
      <th class="w-20 py-4 ...">Mascota</th>
      <th class="w-25 py-4 ...">Fecha de Inicio</th>
      <th class="w-25 py-4 ...">Fecha de Conclucion</th>
      <th class="w-1/32 py-4 ...">Diagnostico</th>
      <th class="w-25 py-4 ...">Precio</th>



      <th class="w-25 py-4 ...">Actions</th>
    </tr>
  </thead>
  <tbody>


  @foreach($tratamiento as $tratamientos) 
      
<tr>
        <td class="py-3 px-6 text-center">{{$tratamientos->id}}</td>


        @foreach($mascota as $mascotas)
       
       @if($tratamientos->mascota_id == $mascotas->id)
       <td class="p-3 text-center">{{$mascotas->nombre}}</td>
       @endif
       
       @endforeach

        <td class="py-3 px-6 text-center">{{$tratamientos->finicio}}</td>
        <td class="py-3 px-6 text-center">{{$tratamientos->ffin}}</td>
        <td class="py-3 px-6 text-center">{{$tratamientos->diagnostico}}</td>
        <td class="py-3 px-6 text-center">{{$tratamientos->precio}}</td>



        <td class="p-3 text-center">
        <a href="{{route('admin.destroytratamiento',$tratamientos->id )}}" class="text-black font-semibold border-2 border-red-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-red-500 hover:text-white">Borrar</a>
        <a href="{{route('admin.edittratamiento',$tratamientos->id )}}" class="text-black font-semibold border-2 border-blue-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-blue-500 hover:text-white">Editar</a>
        
          
          </td>
      </tr>
 
      @endforeach
    
  </tbody>
</table>
</div>
@endsection