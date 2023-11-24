@extends('layouts.main')

@section('content')

<div>
  <h3>Автомобили на стоянке</h3>
</div><br>

<div>
  <table class="table table-striped">

    <thead class="thead-dark">
      <tr>
        <th scope="col">Марка, модель</th>
        <th scope="col">Цвет</th>
        <th scope="col">Номер</th>
        <th scope="col">Удалить со стоянки</th>
      </tr>
    </thead>
    
    <div>
      <tbody>
        @foreach($autos as $auto)
        
        <tr>
          <td>{{ $auto->brand }} {{ $auto->model }}</td>
          <td>{{ $auto->color }}</td>
          <td>{{ $auto->reg_number }}</td>
          <td>
          <form action="{{ route('on_parking.update', $auto->id) }}" method="post">
            @csrf
            @method('patch')
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
  {{ $autos->links() }}
</div>

<div>
  <h4>Всего: {{ $auto_amount }} </h4>
</div><br>

@endsection 
