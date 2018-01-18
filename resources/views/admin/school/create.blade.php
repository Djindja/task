@extends("admin.includes.master")

@section('title', Lang::get('titles.country.createTitle'))


@section('content')

<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url("/admin/country/create")}}">
  {{csrf_field()}}

  <div class="col-md-3">
    <div class="form-group">
        <label>{{Lang::get('titles.country.icon')}}</label>
        <img src="{{url("uploads/users/avatar.jpg")}}" style="width: 100%;">
        <input type="file" id="inputImage" name="image">
    </div>
  </div>

<div class="col-md-9">
 <div class="x_content">
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.country.name')}}<span class="required">*</span>
    </label>
   <div class="col-md-4">
      <input id="addCountry" name="name" class="form-control col-md-4 form-group" required="required" type="text" value="{{old('name')}}">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.country.street')}}
    </label>
    <div class="col-md-4">
      <input name="street" class="form-control form-group" type="text" value="{{old('street')}}"/>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.country.city')}}
    </label>
    <div class="col-md-4">
      <input name="city" class="form-control form-group" type="text" value="{{old('city')}}"/>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.country.phone')}}
    </label>
    <div class="col-md-4">
      <input name="phone_number" class="form-control form-group" type="text" value="{{old('phone_number')}}"/>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.country.email')}}
    </label>
    <div class="col-md-4">
      <input name="email" class="form-control form-group" type="text" value="{{old('email')}}"/>
    </div>
  </div>

  <div class="col-md-2">
      <button type="submit" class="btn btn-primary btn-md col-md-6">{{Lang::get('titles.country.submitButton')}}</button>
  </div>
 </div>
</div>
</form>

@endsection
