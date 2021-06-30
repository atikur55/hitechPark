@extends('layout.master')
@section('title')
View Description
@endsection
@section('description')
active
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush


@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Description Table</li>
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
            View Banner
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
                <th>SHORT HEADING</th>
                <th>BUTTON</th>
                <th>CASE HEAD</th>
                <th>CASE ONE TITLE</th>
                <th>CASE ONE BUTTON</th>
                <th>CASE TWO TITLE</th>
                <th>CASE TWO BUTTON</th>
                <th>STATUS</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($all_description as $description)
            <tr class="{{$description->status == 1?'bg-secondary':''}}">
              <td>{{$i}}</td>
              <td>{{\Illuminate\Support\str::limit($description->heading,25,'....')}}</td>
              <td>{{\Illuminate\Support\str::limit($description->short_heading,25,'....')}}</td>
              <td>{{$description->button}}</td>
              <td>{{\Illuminate\Support\str::limit($description->case_head,25,'....')}}</td>
              <td>{{\Illuminate\Support\str::limit($description->ca_one_title,25,'....')}}</td>
              <td>{{$description->ca_one_btn}}</td>
              <td>{{\Illuminate\Support\str::limit($description->ca_two_title,25,'....')}}</td>
              <td>{{$description->ca_two_btn}}</td>
              <td>
                <a href="{{url('active_description')}}/{{$description->id}}" class="btn @php echo $description->status == 0?'bg-maroon':'bg-blue'@endphp">
                  @php
                  echo $description->status == 0?'Off&nbsp&nbsp&nbsp<i data-feather="toggle-left"></i>':'On&nbsp&nbsp&nbsp<i data-feather="toggle-right"></i>'
                  @endphp
                </a>
              </td>
              <td>
                <a style="color: #000;" href="{{url('edit_description')}}/{{$description->id}}"><i data-feather="edit"></i></a>
                <a style="color: #000;" href="{{url('delete_description')}}/{{$description->id}}"><i data-feather="trash"></i></a>
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
