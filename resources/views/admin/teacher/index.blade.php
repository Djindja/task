@extends("admin.includes.master")

@section('title', Lang::get('titles.teacher.title'))

@section('content')

<div class="col-xs-12">
  <div class="x_panel">
    <button style="float: right;" class="btn btn-primary btn-lg" onClick="window.open('{{url("teacher/create")}}', '_self');">+ {{Lang::get('titles.add')}}</button>
    <div class="x_title">
      <h2>{{Lang::get('titles.teacher.list')}}</h2>
      </br>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <table class="table">
        <thead>
          <tr>
            <th style="text-align: left; width: 5%;">#</th>
            <th style="text-align: left; width: 20%;">{{Lang::get('titles.teacher.first_name')}}</th>
            <th style="text-align: left; width: 20%;">{{Lang::get('titles.teacher.last_name')}}</th>
            <th style="text-align: left; width: 20%;">{{Lang::get('titles.teacher.birth_date')}}</th>
            <th style="text-align: center; width: 5%;">{{Lang::get('titles.edit')}}</th>
            <th style="text-align: center; width: 5%;">{{Lang::get('titles.delete')}}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($teachers as $index => $teacher)
          <tr>
          <th style="text-align: left; width: 5%;" scope="row">{{$index+1}}</th>
            <td style="text-align: left; width: 30%;">{{$teacher->first_name}}</td>
            <td style="text-align: left; width: 30%;">{{$teacher->last_name}}</td>
            <td style="text-align: left; width: 50%;">{{$teacher->birth_date}}</td>
            <td style="text-align: center; width: 5%;"><a href="{{url("teacher/edit/$teacher->id")}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            <td style="text-align: center; width: 5%;"><a onclick="return (confirm('Are you sure?'))" href="{{url("teacher/delete/$teacher->id")}}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
