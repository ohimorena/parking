@extends('layouts.main')

@section('content')

  <div align=center>
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
            <form action="{{ route('on_parking.update_remove', $auto->id) }}" method="post">
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
    <h4>Всего: {{ $auto_amount }} </h4>
  </div><br>

  <div align=center>
    <p><h4>Добавить автомобиль на стоянку</h4></p>
  </div>

  <div>
    <select class="form-select" name="cust_id" id="cust_id">
      <option selected disabled>КЛИЕНТ</option>
        @foreach ($custs as $cust)
          <option value="{{ $cust->id }}">{{ $cust->full_name }}</option>
        @endforeach
    </select>
  </div><br>

  <div>
    <select class="form-select" id="auto_id">
      <option selected disabled>АВТОМОБИЛИ КЛИЕНТА</option>
    </select>
  </div><br>

  <form action="{{ route('on_parking.store') }}" method="post">
    @csrf

    <input type="hidden" name="auto_id" id="auto_id_hidden" value="">

    <div align=center>
      <input type="submit" value="Добавить" class="btn btn-info btn-md">
    </div><br><br>

  </form>

@endsection


@section('script')

  <script>
    $(document).ready(function() {
      $('#cust_id').change(function() {
        var cust_id = $(this).val();
        url = '/on_parking/autos/' + cust_id;
        $.get(url, cust_id, function(data) {
          $('#auto_id').empty();
          $.each(data, function(key, value) {
            $('#auto_id').append('<option selected disabled>АВТОМОБИЛИ КЛИЕНТА</option>');
            $.each(value, function(index, auto) {
              $('#auto_id').append('<option value='+auto.id+'>'+auto.brand+' '+auto.model+', '+auto.color+', '+auto.reg_number+'</option');
            })
          })
        });
        $('#auto_id').change(function() {
          var id = $(this).children("option:selected").val();
          $('#auto_id_hidden').attr("value", id);
        })
      });
    });   
  </script>

@endsection('script')