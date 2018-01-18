@extends("admin.includes.master")

@section('title', $country->name)


@section('content')

<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url("/admin/country/edit/$country->id")}}">
  {{csrf_field()}}

  <div class="col-md-3">
    <div class="form-group">
        <label>{{Lang::get('titles.country.icon')}}</label>
      @if(is_null($country->image))
        <img src="{{url("uploads/users/avatar.jpg")}}" style="width: 100%;">
      @else
        <img src="{{"$country->image"}}" style="width: 100%;">
      @endif
      <input type="file" id="inputImage" name="image">
    </div>
  </div>

<div class="col-md-9">
    <div class="x_content">
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.country.name')}}<span class="required">*</span>
    </label>
    <div class="col-md-4">
      <input id="addCountry" name="name" class="form-control col-md-4 form-group" required="required" type="text" value="{{$country->name}}">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.country.street')}}
    </label>
    <div class="col-md-4">
      <input name="street" class="form-control form-group" type="text" value="{{$country->street}}"/>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.country.city')}}
    </label>
    <div class="col-md-4">
      <input name="city" class="form-control form-group" type="text" value="{{$country->city}}"/>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.country.phone')}}
    </label>
    <div class="col-md-4">
      <input name="phone_number" class="form-control form-group" type="text" value="{{$country->phone_number}}"/>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.country.email')}}
    </label>
    <div class="col-md-4">
      <input name="email" class="form-control form-group" type="text" value="{{$country->email}}"/>
    </div>
  </div>

  <div class="col-md-2">
      <button type="submit" class="btn btn-primary">{{Lang::get('titles.country.submitButton')}}</button>
  </div>
  </div>
</div>
</form>

@endsection
