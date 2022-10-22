@extends('cliente.app')

@section('title','Productos')

@section('content')


  <h1 class=" my-10 text-3xl text-center font-bold">Lista de {{$categoria->nombre}}</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-gray-700 text-white">
      <th class="w-1/32 py-4 ...">Nombre</th>
      <th class="w-1/32 py-4 ...">Descripcion</th>
      <th class="w-1/32 py-4 ...">Categoria</th>
      <th class="w-1/32 py-4 ...">Presentacion</th>
      <th class="w-1/32 py-4 ...">Marca</th>
      <th class="w-1/32 py-4 ...">Precio</th>
    </tr>
  </thead>
  <tbody>

  @foreach($producto as $productos)
  @if($productos->categoria_id == $categoria->id)
    
      <tr>

    
        <td class="p-3 text-center">{{$productos->nombre}}</td>
        <td class="p-3 text-center">{{$productos->descripcion}}</td>



     @foreach($cate as $categorias)
       
       @if($productos->categoria_id == $categorias->id)
       <td class="p-3 text-center">{{$categorias->nombre}}</td>
       @endif
       
       @endforeach

       @foreach($presentacion as $presentacions)
       
       @if($productos->presentacion_id == $presentacions->id)
       <td class="p-3 text-center">{{$presentacions->nombre}}</td>
       @endif
       
       @endforeach


       @foreach($marca as $marcas)
       
       @if($productos->marca_id == $marcas->id)
       <td class="p-3 text-center">{{$marcas->nombre}}</td>
       @endif
       
       @endforeach

        <td class="p-3 text-center"> {{$productos->precio}} Bs. </td>

      </tr>
      @endif
    @endforeach
  </tbody>
</table>
</div>

@endsection