@extends('layout.master')
@section('title')
View Country Contact
@endsection
@section('country_contact')
active
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush


@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Country Contact Table</li>
  </ol>
</nav>

<div class="row">
  @if(session('delete'))  
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('delete')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-7">
            View Country Contact
          </div>
          <div class="col-lg-5" style="text-align:end;">
            <a style="color: #000;" href="{{url('create_banner')}}"><i data-feather="plus-square"></i></a>
          </div>
        </div>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table id="dataTableExample" class="table table-striped text-center">
            <thead>
              <tr>
                <th>SL No</th>
                <th>HEADING</th>
                <th>COUNTRY ONE</th>
                <th>COUNTRY TWO</th>
                <th>COUNTRY THREE</th>
                <th>COUNTRY FOUR</th>
                <th>STATUS</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($all_countries as $country)
            <tr class="{{$country->status == 1?'bg-secondary':''}}">
              <td>{{$i}}</td>
              <td>{{\Illuminate\Support\str::limit($country->title,25,'....')}}</td>
              <td>{{$country->country_one}}</td>
              <td>{{$country->country_two}}</td>
              <td>{{$country->country_three}}</td>
              <td>{{$country->country_four}}</td>
              <td>
                <a href="{{url('active_description')}}/{{$country->id}}" class="btn @php echo $country->status == 0?'bg-maroon':'bg-blue'@endphp">
                  @php
                  echo $country->status == 0?'Off&nbsp&nbsp&nbsp<i data-feather="toggle-left"></i>':'On&nbsp&nbsp&nbsp<i data-feather="toggle-right"></i>'
                  @endphp
                </a>
              </td>
              <td>
                <a style="color: #000;" href="{{url('edit_description')}}/{{$country->id}}"><i data-feather="edit"></i></a>
                <a style="color: #000;" href="{{url('delete_description')}}/{{$country->id}}"><i data-feather="trash"></i></a>
              </td>
            </tr>
            @php $i++; @endphp
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
