@extends('layouts.main')

@section('content')

<h3>Все клиенты</h3><br>

<div>
  <table class="table table-striped">

    <thead class="thead-dark">
      <tr>
        <th scope="col">ФИО</th>
        <th scope="col">Автомобиль</th>
        <th scope="col">Номер</th>
        <th scope="col">Изменить</th>
        <th scope="col">Удалить автомобиль</th>
      </tr>
    </thead>
  
    <div>
      <tbody>
        @foreach($custs_autos as $cust_auto)
        
        <tr>
          <td>{{ $cust_auto->full_name }}</td>
          <td>{{ $cust_auto->brand }} {{ $cust_auto->model }}, {{ $cust_auto->color }}</td>
          <td>{{ $cust_auto->reg_number }}</td>
          <td><a href="{{ route('custs.edit', $cust_auto->id) }}">&#128393;</td></a>
          <td>
          <form action="{{ route('autos.destroy', $cust_auto->auto_id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="&#9746;" class="btn btn-light btn-sm">
          </form>
          </td>
        </tr>
        
        @endforeach
      </tbody>
    </div>
    
  </table>
</div>

<div>
  {{ $custs_autos->links() }}
</div>

@endsection 
