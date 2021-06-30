@extends('layout.master')
@section('title')
Client Enquiry Form
@endsection
@section('cef')
active
@endsection
@section('css_script')
<style type="text/css">
 .color input{
    border: 2px solid #228752;
    margin-bottom: 20px;
  }
  .color textarea{
    border: 2px solid #228752;
  }
  .color select{
    border: 2px solid #228752;
  }
  .button{
    margin-top: 30px;
  }
  .button button{
    padding: 8px 30px;
  }
</style>
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush


@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Client Enquiry Form</li>
  </ol>
</nav>

<div class="row">
  @if(session('success'))
  <div class="alert alert-success">
    <strong>{{session('success')}}</strong>
  </div>
  @endif
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-center">Client Enquiry Form</h2>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="col-lg-7 m-auto">
          <form action="{{url('upload_post')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label>Upload</label>
                <input type="file" name="voice_mp3" class="form-control">
              </div>
              <div class="form-group text-center button">
                <button type="submit" class="btn btn-success">Upload</button>
              </div>
          </form>
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
