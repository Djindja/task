@extends("admin.includes.master")

@section('title', Lang::get('titles.school.title'))

@section('content')

<div class="col-xs-12">
  <div class="x_panel">
    <button style="float: right;" class="btn btn-primary btn-lg" onClick="window.open('{{url("school/create")}}', '_self');">+ {{Lang::get('titles.add')}}</button>
    <div class="x_title">
      <h2>{{Lang::get('titles.school.list')}}</h2>
      </br>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <table class="table">
        <thead>
          <tr>
            <th style="text-align: left; width: 5%;">#</th>
            <th style="text-align: left; width: 20%;">{{Lang::get('titles.school.name')}}</th>
            <th style="text-align: left; width: 20%;">{{Lang::get('titles.school.year')}}</th>
            <th style="text-align: left; width: 20%;">{{Lang::get('titles.school.city')}}</th>
            <th style="text-align: center; width: 5%;">{{Lang::get('titles.edit')}}</th>
            <th style="text-align: center; width: 5%;">{{Lang::get('titles.delete')}}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($schools as $index => $school)
          <tr>
          <th style="text-align: left; width: 5%;" scope="row">{{$index+1}}</th>
            <td style="text-align: left; width: 30%;">{{$school->school_name}}</td>
            <td style="text-align: left; width: 30%;">{{$school->year_founded}}</td>
            <td style="text-align: left; width: 50%;">{{$school->city}}</td>
            <td style="text-align: center; width: 5%;"><a href="{{url("school/edit/$school->id")}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            <td style="text-align: center; width: 5%;"><a onclick="return (confirm('Are you sure?'))" href="{{url("school/delete/$school->id")}}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
