@extends('layouts.app')

@section('title','Registrar Visita')

@section('content')

<nav class="bg-green-500 py-6">
    <a href="{{route('admin.indexvisita')}}" class="text-white mx-16 font-semibold border-2 border-white py-3 px-5 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>
</nav>

<div class="block mx-auto my-12 p-8 bg-white w-1/3 borderr border-gray-200 rounded-lg shadow-lg">
<h1 class="text-3xl text-center font-bold">Registrar Visita</h1>

<form class="mt-4" method="POST" action="{{route('admin.storedvisita')}}">
@csrf

<label for="">Veterinario</label>
<select name=user_id id=user_id class="form-control">
        <option value=""> -- escoja el veterinario --</option>

        @foreach($user as $users)
        @if($users->role == 'veterinario')
        <option value="{{$users['id']}}">{{$users['name']}}</option>
       @endif

        @endforeach
        
    </select>
        @error('user_id')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

        <div class="my-5"></div>




    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Descripcion" id="descripcion" name="descripcion">
    @error('descripcion')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Detalle" id="detalle" name="detalle">
    @error('detalle')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <input type="date" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Fecha" id="fecha" name="fecha">
    @error('fecha')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <input type="time" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Hora" id="hora" name="hora">
    @error('hora')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <button type="sudmit" class="rounded-md bg-green-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-green-600">Registrar</button>

</form>



</div>
@endsection