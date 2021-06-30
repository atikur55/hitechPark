<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      <!-- Noble<span>UI</span> -->
      <img src="{{asset('assets/images/logo_btl.png')}}" style="width: 100%;" alt="">
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
    @if(Auth::user()->role == 1)
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item">
        <a href="{{ url('/home') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
     


      <!-- =================
              EIT Requirement
        =====================  --> 
      <li class="nav-item {@yield('cef')">
        <a href="{{ url('/view_enquiry') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Client Enquiry List</span>
        </a>
      </li>
      <!-- =================
             End EIT Requirement
        =====================  --> 
    </ul>
  </div>
  @else
  <!-- User Dashboard -->
  <div class="sidebar-body">
    <ul class="nav">
      <!-- <li class="nav-item nav-category">Main</li> -->
      <li class="nav-item ">
        <a href="{{ url('/home') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Home</span>
        </a>
      </li>
      <!-- =================
              EIT Requirement
        =====================  --> 
      <li class="nav-item @yield('cef')">
        <a href="{{ url('/cef') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Client Enquiry Form</span>
        </a>
      </li>

     <!--  <li class="nav-item @yield('mp3upload')">
        <a href="{{ url('/mp3upload') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Upload</span>
        </a>
      </li> -->
 
    </ul>
  </div>
  @endif
</nav>
