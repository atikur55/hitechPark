@extends('layout.master')
@section('title')
Create Country Contact
@endsection
@section('country_contact')
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
            Add Country Contact 
          </div>
          <div class="col-lg-5" style="text-align:end;">
            <a style="color: #000;" href="{{url('view_banner')}}"><i data-feather="arrow-left-circle"></i></a>
          </div>
        </div>
      </div>
            <div class="card-body">
                <div class="col-lg-7 m-auto">
                  <form action="{{url('country_contact_post')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Countey Contact Heading</label>
                      <input type="text" name="title" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Country Contact Title">
                      @error('title')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Country Name One</label><br>
                      <input type="text" name="country_one" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Country Name One">
                      @error('country_one')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Country Name Two</label><br>
                      <input type="text" name="country_two" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Country Name Two">
                      @error('country_one')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Country Name Three</label><br>
                      <input type="text" name="country_three" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Country Name Three">
                      @error('country_three')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Country Name Four</label><br>
                      <input type="text" name="country_four" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Country Name Four">
                      @error('country_four')
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
