
<nav class="navbar navbar-expand-sm py-0 bg-dark navbar-dark fixed-top py-md-0" >

  <div class="container">
    <!-- Brand/logo -->
    <a class="navbar-brand float-left" >
      <img src="img/ic.png" alt="logo" style="width:70px"> 
    </a>

      <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          
            <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
                  <li class="nav-item dropdown py-0 ">
                      <a id="navbarDropdown " class="nav-link dropdown-toggle " style="font-size:large" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>
                      <div class="card-body">
                      <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item bg-light" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>
                      </div>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
          </ul>
      </div>
  </div>
</nav>
