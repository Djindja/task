@extends("admin.includes.master")

@section('title', Lang::get('titles.school.create'))

@section('content')

<form class="form-horizontal" method="POST" action="{{url("/school/create")}}">
  {{csrf_field()}}

 <div class="x_content">
     <h2>{{Lang::get('titles.school.create')}}</h2>
 </br>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.school.name')}}<span class="required"> *</span>
    </label>
   <div class="col-md-4">
      <input name="school_name" class="form-control col-md-4 form-group" required="required" type="text" value="{{old('school_name')}}">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.school.year')}}<span class="required"> *</span>
    </label>
    <div class="col-md-4">
      <input name="year_founded" class="form-control form-group" required="required" type="date" value="{{old('year_founded')}}"/>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.school.city')}}
    </label>
    <div class="col-md-4">
      <input name="city" class="form-control form-group" type="text" value="{{old('city')}}"/>
    </div>
  </div>

  <div class="col-md-2">
      <button type="submit" class="btn btn-primary btn-md col-md-6">{{Lang::get('titles.submit')}}</button>
  </div>
 </div>
</form>

@endsection
