@extends("admin.includes.master")

@section('title', Lang::get('titles.country.title'))

@section('content')

<div class="col-xs-12">
  <div class="x_panel">
    <button style="float: right;" class="btn btn-primary btn-lg" onClick="window.open('{{url("admin/country/create")}}', '_self');">+ {{Lang::get('titles.add')}}</button>
    <div class="x_title">
      <h2>{{Lang::get('titles.country.countries')}}</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <table class="table">
        <thead>
          <tr>
            <th style="text-align: left; width: 5%;">#</th>
            <th style="text-align: left; width: 50%;">{{Lang::get('titles.country.icon')}}</th>
            <th style="text-align: left; width: 50%;">{{Lang::get('titles.country.countryName')}}</th>
            <th style="text-align: center; width: 5%;">{{Lang::get('titles.edit')}}</th>
            <th style="text-align: center; width: 5%;">{{Lang::get('titles.delete')}}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($countries as $index => $country)
          <tr>
          <th style="text-align: left; width: 5%;" scope="row">{{$index+1}}</th>
            <td style="text-align: left; width: 30%;">@if( ! empty($country->image))<img src="{{$country->image}}" width ="20px"/>@endif</td>
            <td style="text-align: left; width: 50%;">{{$country->name}}</td>
            <td style="text-align: center; width: 5%;"><a href="{{url("admin/country/edit/$country->id")}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            <td style="text-align: center; width: 5%;"><a onclick="return (confirm('Everything related to this country will be deleted includiing categories, merchants and offers. Are you sure?'))" href="{{url("admin/country/delete/$country->id")}}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
