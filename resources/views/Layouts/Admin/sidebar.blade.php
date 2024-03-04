<div id="base-url" data-url="{{url("/")}}"></div>
<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('dashboard-admin') }}">SI-MASTER</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="{{ route('dashboard-admin') }}">SM</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="nav-item dropdown">
      <a href="{{ route('dashboard-admin') }}" class="nav-link"><i
        class="fas fa-fire"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Data Master</li>
    <li class="nav-item dropdown">
      <a href="{{ route('data-user') }}" class="nav-link"><i class="fas fa-users"></i><span>User</span></a>
    </li>
    <li class="nav-item dropdown">
      <a href="{{ route('data-post')}}" class="nav-link"><i class="fas fa-pen"></i><span>Post</span></a>
    </li>
    <li class="nav-item dropdown">
      <a href="{{ route('data-project') }}" class="nav-link"><i class="fas fa-hdd"></i><span>Project</span></a>
    </li>
    <li class="nav-item dropdown">
      <a href="{{ route('data-skill') }}" class="nav-link"><i class="fas fa-code"></i><span>Skill</span></a>
    </li>
    <li class="nav-item dropdown">
      <a href="{{ route('data-message') }}" class="nav-link"><i
        class="fas fa-envelope"></i><span>Message</span></a>
    </li>
    <li class="nav-item dropdown">
      <a href="{{ route('data-testimonial') }}" class="nav-link"><i
        class="fas fa-quote-left"></i><span>Testimonial</span></a>
    </li>
    <li class="nav-item dropdown">
      <a href="{{ route('data-certificate') }}" class="nav-link"><i
        class="fas fa-file"></i><span>Certificate</span></a>
    </li>
    <li class="nav-item dropdown">
      <a href="{{ route('data-cv') }}" class="nav-link"><i class="fas fa-file-archive"></i><span>CV</span></a>
    </li>







  </ul>

  <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
      <i class="fas fa-rocket"></i> Simaster Wallet
    </a>
  </div>
</aside>