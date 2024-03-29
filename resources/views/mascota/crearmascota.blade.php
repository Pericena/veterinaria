@extends('layouts.app')

@section('title','Registrar Mascota')

@section('content')


<nav class="bg-green-500 py-6">
    <a href="{{route('admin.listamascota')}}" class="text-white mx-16 font-semibold border-2 border-white py-3 px-5 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>
</nav>

<div class="block mx-auto my-12 p-8 bg-white w-1/3 borderr border-gray-200 rounded-lg shadow-lg">
<h1 class="text-3xl text-center font-bold">Registrar Mascota</h1>

<form class="mt-4" method="POST" action="{{route('admin.storedmascota')}}">
    @csrf

    <div class="my-5"></div>

    <label for="">Dueño</label>
    <select name=user_id id=user_id class="form-control">
        <option value=""> -- escoja el Dueño --</option>

        @foreach($user as $users)
        @if($users->role == 'cliente')
        <option value="{{$users['id']}}">{{$users['name']}}</option>
       @endif


        @endforeach
        
    </select>


        @error('user_id')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror


    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Nombre" id="nombre" name="nombre">
    @error('nombre')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <div>
                <label class="text-white dark:text-gray-200" for="passwordConfirmation">Date</label>
                <input id="fnacimiento" name="fnacimiento" type="date" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white">
            </div>
    @error('fnacimiento')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror
   
    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Color" id="color" name="color">
    @error('color')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Sexo" id="sexo" name="sexo">
   
    @error('sexo')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Link imagen" id="imagen" name="imagen">
   
    @error('imagen')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror



    <div>


    <label for="">Raza</label>
    <select name=raza_id id=raza_id class="form-control">
        <option value=""> -- escoja la Raza --</option>

        @foreach($raza as $razas)
        <option value="{{$razas['id']}}">{{$razas['nombre']}}</option>

        @endforeach
        
    </select>
    
    @error('raza_id')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <div class="my-5"></div>



    
    <button type="sudmit" class="rounded-md bg-green-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-green-600">Crear</button>

</form>



</div>
@endsection
