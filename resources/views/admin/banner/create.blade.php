@extends('layout.master')
@section('title')
Create Banner
@endsection
@section('banner')
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
            Add Banner 
          </div>
          <div class="col-lg-5" style="text-align:end;">
            <a style="color: #000;" href="{{url('view_banner')}}"><i data-feather="arrow-left-circle"></i></a>
          </div>
        </div>
      </div>
            <div class="card-body">
                <div class="col-lg-7 m-auto">
                  <form action="{{url('banner_post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Banner Title</label>
                      <input type="text" name="title" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Banner Title">
                      @error('title')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Button Name</label><br>
                      <input type="text" name="button" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Button Name">
                      @error('button')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Photo</label>
                      <input type="file" class="form-control" id="exampleInputUsername1" name="image" autocomplete="off">
                      @error('image')
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
