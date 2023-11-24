@extends('layouts.main')

@section('content')

<div align=center>
  <p><h4>Добавить клиента</h4></p>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
  <form action="{{ route('custs.store') }}" method="post">
    @csrf
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Фамилия, имя, отчество</label>
      <div class="col-sm-10">
      <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    </div>

    <div>
      <fieldset>
        <div class="row mb-3">
          <legend class="col-form-label col-sm-2 pt-0">Пол</legend>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sex" id="sex1" value="мужской" checked>
              <label class="form-check-label" for="sex1">
                мужской
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sex" id="sex2" value="женский">
              <label class="form-check-label" for="sex2">
                женский
              </label>
            </div>
          </div>
        </div>
      </fieldset>
    </div>

    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Телефон</label>
      <div class="col-sm-10">
        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    </div>

    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Адрес</label>
      <div class="col-sm-10">
        <input type="text" name="address" value="{{ old('address') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    </div>

    <div align=center>
      <p><h5>Автомобиль</h5></p>
    </div>

    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Марка</label>
      <div class="col-sm-10">
        <input type="text" name="brand" value="{{ old('brand') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    </div>

    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Модель</label>
      <div class="col-sm-10">
        <input type="text" name="model" value="{{ old('model') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    </div>

    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Цвет кузова</label>
      <div class="col-sm-10">
        <input type="text" name="color" value="{{ old('color') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    </div>

    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Государственный номер РФ</label>
      <div class="col-sm-10">
        <input type="text" name="reg_number" value="{{ old('reg_number') }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="is_parking" value="1" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Автомобиль находится на стоянке в данный момент
      </label>
    </div>

    <div align=center>
      <input type="submit" value="Сохранить" class="btn btn-info btn-md">
    </div><br>
  </form>
</div>
@endsection 
    