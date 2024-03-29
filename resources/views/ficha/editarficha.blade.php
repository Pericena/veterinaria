@extends('layouts.app')

@section('title','Editar Ficha')

@section('content')

<nav class="bg-green-500 py-6">
    <a href="{{route('admin.indexficha')}}" class="text-white mx-16 font-semibold border-2 border-white py-3 px-5 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>
</nav>

<div class="block mx-auto my-12 p-8 bg-white w-1/3 borderr border-gray-200 rounded-lg shadow-lg">
<h1 class="text-3xl text-center font-bold">Editar Ficha</h1>

<form class="mt-4" method="POST" action="{{route('admin.updateficha', $ficha->id)}}">
@csrf
                                               <div>
                <label class=" dark:text-gray-200" for="passwordConfirmation">Fecha:</label>
                <input id="fecha" name="fecha" type="date" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" value="{{$ficha->fecha}}">
                @error('fecha')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

            </div>

    <label for="">Periodo</label>
    <select name=periodo_id id=periodo_id class="form-control">
        <option value=""> -- escoja un Periodo --</option>
       
        @foreach($periodo as $periodos)
        <option value="{{$periodos['id']}}">{{$periodos['inicio']}} - {{$periodos['fin']}}</option>

        @endforeach

        
    </select>
        @error('periodo_id')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror


    <div class="my-5"></div>

    <label for="">Reservas</label>
    <select name=reserva_id id=reserva_id class="form-control">
        <option value=""> -- escoja una Reserva --</option>
       
        @foreach($reserva as $reservas)
        <option value="{{$reservas['id']}}">{{$reservas['id']}} - {{$reservas['fecha']}} </option>

        @endforeach

        
    </select>
        @error('reserva_id')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror



 

    <button type="sudmit" class="rounded-md bg-green-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-green-600">Editar</button>

</form>



</div>
@endsection