@extends('layout.master')
@section('title')
Edit Description
@endsection
@section('description')
active
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush
@section('content')

<div class="row">
  <div class="col-lg-12 stretch-card">
    <div class="card">
      @if(session('success'))  
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <div class="card-header">
        <div class="row">
          <div class="col-lg-7">
            Add Description 
          </div>
          <div class="col-lg-5" style="text-align:end;">
            <a style="color: #000;" href="{{url('view_banner')}}"><i data-feather="arrow-left-circle"></i></a>
          </div>
        </div>
      </div>
            <div class="card-body">
                <div class="col-lg-7 m-auto">
                  <form action="{{url('edit_description_post')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Description Heading</label>
                      <input type="text" name="heading" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$description->heading}}">
                      <input type="hidden" name="id" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$description->id}}">
                      @error('heading')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Description Short Heading</label><br>
                      <input type="text" name="short_heading" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$description->short_heading}}">
                      @error('short_heading')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Description Button</label><br>
                      <input type="text" name="button" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$description->button}}">
                      @error('button')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Case Heading</label><br>
                      <input type="text" name="case_head" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$description->case_head}}">
                      @error('case_head')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Case One Title</label><br>
                      <input type="text" name="ca_one_title" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$description->ca_one_title}}">
                      @error('ca_one_title')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Case One Button Name</label><br>
                      <input type="text" name="ca_one_btn" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$description->ca_one_btn}}">
                      @error('ca_one_btn')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Case Two Title</label><br>
                      <input type="text" name="ca_two_title" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$description->ca_two_title}}">
                      @error('ca_two_title')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Case Two Button Name</label><br>
                      <input type="text" name="ca_two_btn" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$description->ca_two_btn}}">
                      @error('ca_two_btn')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
        </div>

      </div>
   

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush
@section('js_script')
<script type="text/javascript">
  $(".file_type").change(function()
  {
      $(".file_type").prop('checked',false);
      $(this).prop('checked',true);
  });
</script>
@endsection
