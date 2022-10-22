@extends('cliente.app')

@section('title','Tratamientos de la Mascota')

@section('content')

  <h1 class=" my-10 text-3xl text-center font-bold">Historial Clinico de {{$mascota->nombre}}</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-gray-600 text-white">
     <th class="w-1/32 py-4 ...">Diagnostico</th>
      <th class="w-25 py-4 ...">Fecha de Inicio</th>
      <th class="w-25 py-4 ...">Fecha de Conclucion</th>
      <th class="w-25 py-4 ...">Precio</th>

    </tr>
  </thead>
  <tbody>
  @foreach($tratamiento as $tratamientos)
       
  @if($tratamientos->mascota_id == $mascota->id)
<tr>

        <td class="py-3 px-6 text-center">{{$tratamientos->diagnostico}}</td>
        <td class="py-3 px-6 text-center">{{$tratamientos->finicio}}</td>
        <td class="py-3 px-6 text-center">{{$tratamientos->ffin}}</td>
        <td class="py-3 px-6 text-center">{{$tratamientos->precio}}</td>

      </tr>

      @endif

   @endforeach

  </tbody>
</table>
</div>

@endsection