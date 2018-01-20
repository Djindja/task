@extends("admin.includes.master")

@section('title', Lang::get('titles.teacher.create'))

@section('content')

<form class="form-horizontal" method="POST" action="{{url("/teacher/create")}}">
  {{csrf_field()}}

 <div class="x_content">
     <h2>{{Lang::get('titles.teacher.create')}}</h2>
 </br>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.teacher.first_name')}}<span class="required"> *</span>
    </label>
   <div class="col-md-4">
      <input name="first_name" class="form-control col-md-4 form-group" required="required" type="text" value="{{old('first_name')}}">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.teacher.last_name')}}<span class="required"> *</span>
    </label>
    <div class="col-md-4">
      <input name="last_name" class="form-control form-group" required="required" type="text" value="{{old('last_name')}}"/>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.teacher.birth_date')}}<span class="required"> *</span>
    </label>
    <div class="col-md-4">
      <input name="birth_date" class="form-control form-group" type="date" value="{{old('birth_date')}}"/>
    </div>
  </div>

  <div class="col-md-2">
      <button type="submit" class="btn btn-primary btn-md col-md-6">{{Lang::get('titles.submit')}}</button>
  </div>
 </div>
</form>

@endsection
