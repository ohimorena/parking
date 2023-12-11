@extends('layouts.main')

@section('content')

<div class="container">
  
  <div>
    <p><h4>Клиент</h4></p>
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

  <div class="form-area">

    <form action="{{ route('custs.update', $cust->id) }}" method="post">
      @csrf
      @method('patch')
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Фамилия, имя, отчество</label>
        <div class="col-sm-10">
          <input type="text" name="full_name" value="{{ $cust->full_name }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
      </div>

      <div>
        <fieldset>
          <div class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Пол</legend>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="sex1" value="мужской" {{ ($cust->sex == "мужской")? "checked" : "" }}>
                <label class="form-check-label" for="sex1">
                  мужской
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="sex2" value="женский" {{ ($cust->sex == "женский")? "checked" : "" }}>
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
          <input type="text" name="phone" value="{{ $cust->phone }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
      </div>

      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Адрес</label>
        <div class="col-sm-10">
          <input type="text" name="address" value="{{ $cust->address }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
      </div>
      
      <div class="button-save-1">
        <input type="submit" value="Сохранить" class="btn btn-primary">
      </div>
    </form>

    <form action="{{ route('custs.destroy', $cust->id) }}" method="post">
      @csrf
      @method('delete')
      <div class="button-delete">
        <input type="submit" value="Удалить" class="btn btn-danger">
      </div>
    </form>

  </div>

  <div>
    <p><h4>Автомобили</h4></p>
  </div>

  @foreach($autos as $auto)
    <div class="form-area">
      <form action="{{ route('autos.update', $auto->id) }}" method="post">
        @csrf
        @method('patch')  
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Марка</label>
            <div class="col-sm-10">
              <input type="text" name="brand" value="{{ $auto->brand }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Модель</label>
            <div class="col-sm-10">
              <input type="text" name="model" value="{{ $auto->model }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Цвет кузова</label>
            <div class="col-sm-10">
              <input type="text" name="color" value="{{ $auto->color }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Государственный номер РФ</label>
            <div class="col-sm-10">
              <input type="text" name="reg_number" value="{{ $auto->reg_number }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_parking" value="1" {{ ($auto->is_parking == "1")? "checked" : "" }} id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Автомобиль находится на стоянке в данный момент
            </label>
          </div>

          <div class="button-save-2">
            <input type="submit" value="Сохранить" class="btn btn-primary">
          </div>
      </form>
    </div>
  @endforeach

  <div class="form-area">
    <form action="{{ route('autos.store') }}" method="post">
      @csrf
      <input type="hidden" name="cust_id" value="{{ $cust->id }}">

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
        <input type="hidden" name="is_parking" value="0">
        <input class="form-check-input" type="checkbox" name="is_parking" value="1" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Автомобиль находится на стоянке в данный момент
        </label>
      </div>

      <div class="button-save-2">
        <input type="submit" value="Сохранить" class="btn btn-primary">
      </div>
    </form>
  </div>
</div>

@endsection 
    