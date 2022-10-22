@extends('layouts.app')

@section('title','Editar Periodo')

@section('content')
<nav class="bg-green-500 py-6">
    <a href="{{route('admin.indexperiodo')}}" class="text-white mx-16 font-semibold border-2 border-white py-3 px-5 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>
</nav>

<div class="block mx-auto my-12 p-8 bg-white w-1/3 borderr border-gray-200 rounded-lg shadow-lg">
<h1 class="text-3xl text-center font-bold">Editar periodo {{$periodo->id}}</h1>

<form class="mt-4" method="POST" action="{{route('admin.updateperiodo', $periodo->id)}}">
@csrf
                                               <div>
                <label class=" dark:text-gray-200" for="passwordConfirmation">Hora de inicio</label>
                <input id="inicio" name="inicio" type="time" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" value="{{$periodo->inicio}}">
            
    @error('inicio')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror</div>

            <div>
                <label class=" dark:text-gray-200" for="passwordConfirmation">Hora de conclucion</label>
                <input id="fin" name="fin" type="time" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" value="{{$periodo->fin}}">
      @error('fin')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror
            </div>

 

    <button type="sudmit" class="rounded-md bg-green-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-green-600">Editar</button>

</form>



</div>
@endsection