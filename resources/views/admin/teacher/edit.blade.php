@extends("admin.includes.master")

@section('title', Lang::get('titles.teacher.edit'))

@section('content')

<form class="form-horizontal" method="POST" action="{{url("/teacher/edit/$teachers->id")}}">
  {{csrf_field()}}

 <div class="x_content">
     <h2>{{Lang::get('titles.teacher.edit')}}</h2>
 </br>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.teacher.first_name')}}<span class="required"> *</span>
    </label>
   <div class="col-md-4">
      <input name="first_name" class="form-control col-md-4 form-group" required="required" type="text" value="{{$teachers->first_name}}">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.teacher.last_name')}}<span class="required"> *</span>
    </label>
    <div class="col-md-4">
      <input name="last_name" class="form-control form-group" required="required" type="text" value="{{$teachers->last_name}}"/>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.teacher.birth_date')}}
    </label>
    <div class="col-md-4">
      <input name="birth_date" class="form-control form-group" type="date" value="{{$teachers->birth_date}}"/>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">{{Lang::get('titles.teacher.school_name')}}<span class="required">*</span></label>
    <div class="col-md-4" style="padding-left: 0; padding-right: 30px;">
      <select id="heard" class="form-control" required="" name="school">
        @foreach($schools as $school)
          @if($school->id == $teachers->school_id)
           <option value="{{$school->id}}" selected>{{$school->school_name}}</option>
          @else
            <option value="{{$school->id}}">{{$school->school_name}}</option>
          @endif
        @endforeach
      </select>
    </div>
  </div>
  </br>
  <div class="col-md-2">
      <button type="submit" class="btn btn-primary btn-md col-md-6">{{Lang::get('titles.submit')}}</button>
  </div>
 </div>
</form>

@endsection
