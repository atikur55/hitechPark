@extends('layout.master')
@section('title')
All List
@endsection
@section('list')
active
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush


@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Enquiry Table</li>
  </ol>
</nav>

<div class="row">
  @if(session('delete'))
  <div class="alert alert-success">
    <strong>{{session('delete')}}</strong>
  </div>
  @endif
  
      <!-- <form action="{{url('download_pdf')}}" method="POST">
        @csrf
        <div class="row">
        <div class="col-md-4">
          <input type="date" name="from_date" class="form-control">
        </div>
        <div class="col-md-4">
          <input type="date" name="to_date" class="form-control">
        </div>
        <div class="col-md-4">
          <button type="submit" class="btn btn-success">Filter</button>
        </div>
        </div>
      </form>  -->
    
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-8">
            View Enquiries
            <form action="{{url('download_pdf')}}" method="POST">
              @csrf
              <div class="row">
              <div class="col-md-3">
                <input type="date" name="from_date" class="form-control">
              </div>
              <div class="col-md-3">
                <input type="date" name="to_date" class="form-control">
              </div>
              <div class="col-md-3">
                <select name="priority" class="form-control">
                    <option value="High">High</option>
                    <option value="interested">Interested</option>
                    <option value="Not Interested">Not Interested</option>
                </select>
              </div>
              <div class="col-md-3">
                <button type="submit" class="btn btn-success"><i style="color: #fff;font-size: 20px;" class="far fa-file-pdf"></i>&nbsp;Filter</button>
              </div>
              </div>
            </form> 
          </div>
          <div class="col-lg-4" style="text-align:end;">
            <!-- <a href="" style="margin-right: 25px;"><i style="color: #000;font-size: 30px;" class="far fa-file-pdf"></i></a> -->
            <a style="color: #000;" href="{{url('/home')}}"><i data-feather="arrow-left-circle"></i></a>
          </div>
        </div>
      </div>
      <div class="card-body">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{session('message')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="table-responsive">
          <table id="dataTableExample" class="table table-striped text-center">
            <thead>
              <tr>
                <th>SL No</th>
                <th>Name</th>
                <th>Website</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Notes</th>
                <th>Address</th>
                <th>Date</th>
                <th>Priority</th>
                <th>Mp3</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($enquiries as $enquiry)
            <tr>
              <td>{{$i}}</td>
              <td>{{$enquiry->name}}</td>
              <td>{{$enquiry->website}}</td>
              <td>{{$enquiry->company}}</td>
              <td>{{$enquiry->email}}</td>
              <td>{{$enquiry->phone}}</td>
              <td>{{$enquiry->notes}}</td>
              <!--<td>{{ Illuminate\Support\Str::limit($enquiry->notes, 20) }}</td>-->
              <td>{{$enquiry->address}}</td>
              <td>{{$enquiry->date}}</td>
              <td>{{$enquiry->priority}}</td>
              <td>{{$enquiry->file}}</td>
              <td>
                <a style="color: #000;" href="{{url('download_mp3')}}/{{$enquiry->id}}"><i data-feather="download"></i></a>
                <a style="color: #000;" href="{{url('delete_enquiry')}}/{{$enquiry->id}}"><i data-feather="delete"></i></a>
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
@section('js_script')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
