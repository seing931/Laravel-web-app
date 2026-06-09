<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
    <div class="container-fluid">
          <div class="navbar-header nav-header">
            <a class="navbar-brand" href="/dashboard" id="home"><i class="tim-icons icon-bank" style="padding: 0 10px 5px 0;"></i><span class="title">Digital Project Management Office (DPMO)</span></a>
        </div>
        <div class="navbar-wrapper d-none">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#">Dashboard</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="dropdown nav-item d-flex align-items-center">
                    <a href="#" class="dropdown-toggle nav-link d-flex align-items-center" data-toggle="dropdown">
                        <div class="photo position-relative">
                            <img src="{{ Vite::asset('resources/img/user-icon.png') }}" alt="Profile Photo" class="rounded-circle" >
                        </div>
                        <label class="nav-link m-0 ml-2">{{ auth()->user()->username }}</label>
                        <b class="caret ml-2"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-navbar">
                        {{-- <li class="nav-link">
                            <a href="{{ route('profile') }}" class="nav-item dropdown-item">Profile</a>
                        </li> --}}
                        <li class="nav-link">
                            <a href="{{ route('resetpassword') }}" class="nav-item dropdown-item">Reset Password</a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="nav-link">
                            <a href="{{ route('logout') }}" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">Log out</a>
                        </li>
                    </ul>
                </li>
                <li class="separator d-lg-none"></li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
        </div>
    </div>
</div>
