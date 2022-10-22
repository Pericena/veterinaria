


@extends('cliente.app')

@section('title','Reserva')

@section('content')


<body class="font-mono bg-gray-400">
		<!-- Container -->
		<div class="container mx-auto">
			<div class="flex justify-center px-6 my-12">
				<!-- Row -->
				<div class="w-full xl:w-3/4 lg:w-11/12 flex">
					<!-- Col -->
					<div
						class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
						style="background-image: url('https://source.unsplash.com/Mv9hjnEUHR4/600x800')"
					></div>
					<!-- Col -->
					<div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
						<h3 class="pt-4 text-2xl text-center">Realizar Reserva</h3>

                        
<form class="mt-4" method="POST" action="{{route('cliente.registrarreserva')}}">
@csrf
<label class="p-3 text-center font-bold" for="">Mascota</label>
<select name=mascota_id id=mascota_id class="form-control">
        <option value=""> -- escoja La Mascota --</option>
       
        @foreach($mascota as $mascotas)
        @if($mascotas->user_id == auth()->user()->id)
        <option value="{{$mascotas['id']}}">{{$mascotas['nombre']}}</option>
        @endif
        @endforeach

    </select>
  
    @error('mascota_id')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

        <div class="my-10"></div>
        <label class="p-3 text-center font-bold" for="">Servicio</label>
        <select name=servicio_id id=servicio_id class="form-control">
        <option value=""> -- escoja El Servicio --</option>
       
        @foreach($servicio as $servicios)
        <option value="{{$servicios['id']}}">{{$servicios['nombre']}}</option>

        @endforeach

    </select>

     @error('servicio_id')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror


        <div class="my-10"></div>
        <label class=" dark:text-gray-200" for="passwordConfirmation">Fecha</label>
                <input id="fecha" name="fecha" type="date" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white">

    
    
                <div class="my-10"></div>
                @error('fecha')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror
        <label class="p-3 text-center font-bold" for="">Periodo</label>

        <select name=periodo_id id=periodo_id class="form-control">
        <option value=""> -- escoja El Periodo --</option>
       
        @foreach($periodo as $periodos)
        <option value="{{$periodos['id']}}">{{$periodos['inicio']}} - {{$periodos['fin']}}</option>

        @endforeach

    </select>

        @error('periodo_id')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

        <div class="my-20"></div>



    <button type="sudmit" class="rounded-md bg-green-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-green-600">Registrar</button>

</form>



					</div>
				</div>
			</div>
		</div>
	</body>

@endsection