 <header class="header" style="background-color: #69339c;">
     <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand text-light" href="{{ route('welcome') }}">{{ env('APP_NAME') }}</a>
  
            <div class="navbar navbar-dark ml-auto">
              <ul class="navbar-nav">
                <li class="nav-item text-dark">
                  <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('auth.register') }}">Register</a>
                </li>
             
              </ul>
            </div>
          </nav>
     </div>
 </header>
