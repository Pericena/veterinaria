@extends('cliente.app')

@section('title','Home Cliente')


@section('content')


  <h1 class="text-3xl text-center font-bold">Lista de Reservas</h1>



  <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-gray-700 text-white">
      <th class="w-20 py-4 ...">ID</th>
      <th class="w-1/16 py-4 ...">Mascota</th>
      <th class="w-1/16 py-4 ...">Fecha</th>


    </tr>
  </thead>
  <tbody>
  @foreach($reserva as $reservas)

 
<tr>
        <td class="py-3 px-6 text-center">{{$reservas->id}}</td>


        @foreach($mascota as $mascotas)
       
       @if($reservas->mascota_id == $mascotas->id)
       <td class="p-3 text-center">{{$mascotas->nombre}}</td>
       @endif
       
       @endforeach


        <td class="py-3 px-6 text-center">{{$reservas->fecha}}</td>



          
      </tr>
    
      @endforeach


  </tbody>
</table>
</div>
@endsection