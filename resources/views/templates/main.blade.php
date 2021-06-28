<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf~token" content="{{csrf_token()}}">

        <title>IndataBee</title>



        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- JS -->
        
        <script src="{{asset('js/app.js')}}" defer ></script>
        <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </head>
    <body class="antialiased">
    
<nav class="navbar navbar-expand-lg mb-0 ">
    <div class="container">

        <a class="navbar-brand" href="/">InDataBee</a>
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        

        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.users.index')}}">Users</a>
            </li>
          </ul>
        </div> -->


        <div class="form-inline my-2 my-lg-0 d-flex">
                     @if (Route::has('login'))
                      <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block ">
                          @auth
                             <a href="{{ url('/') }}" class="text-sm text-gray-700 mr-2"></a>
                              <!-- <a href="{{ url('/home') }}" class="text-sm text-gray-700  text-decoration-none">Home</a> -->

                          @else
                              <a href="{{ route('login') }}" class="text-sm text-gray-700 ">Log in</a>

                              @if (Route::has('register'))
                                  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700  ">Register</a>
                              @endif
                          @endauth
                      </div>
                     @endif
        </div>


@auth
           <div class="dropdown">
              <a class="btn text-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->name }}
              </a>

              <ul class="dropdown-menu m-2 " aria-labelledby="dropdownMenuLink">
                <li class=""><a class="dropdown-item text-dark" href="{{Route('user.profile.index' ,auth()->user()->id  )  }}">Profile</a></li>
                <li> <a  class="dropdown-item text-dark" href="">Account</a></li>
                <li class="">
                <a href="{{ route('logout') }}" class="dropdown-item text-dark"  onclick="event.preventDefault(); 
                              document.getElementById('logout-form').submit(); ">{{ __('Logout') }}</a>

                                <form id ="logout-form" action=" {{ route('logout')}} " method="POST" style="display:none">
                                @csrf
                                </form>
                </li>
              </ul>
            </div>
@endauth


    </div>
</nav>  





@can('is-admin')

<nav class="navbar navbar-expand-lg  mt-0 bg-primary">
    <div class="container  ">

    <div class="form-inline my-2 my-lg-0 d-flex">
           <div class="hidden fixed top-0 right-0 px-2 py-4 sm:block ">
             <a href="{{ route('admin.users.index')}}" class="text-sm text-gray-800 h5 text-decoration-none ">Users</a>
          </div>
    </div>


    <div class="form-inline my-2 my-lg-0 d-flex">
           <div class="hidden fixed top-0 right-0 px-2 py-4 sm:block ">
             <a href="{{ route('admin.instructors.index') }}" class="text-sm text-gray-800 m-5 h5 text-decoration-none">instructors</a>
          </div>
    </div>


    <div class="form-inline my-2 my-lg-0 d-flex">
           <div class="hidden fixed top-0 right-0 px-2 py-4 sm:block ">
             <a href="{{ url('/') }}" class="text-sm text-gray-800 m-5 h5 text-decoration-none ">Courses</a>
          </div>
    </div>


    <div class="form-inline my-2 my-lg-0 d-flex">
           <div class="hidden fixed top-0 right-0 px-2 py-4 sm:block ">
             <a href="{{ url('/') }}" class="text-sm text-gray-800 m-5 h5 text-decoration-none ">Statistics</a>
          </div>
    </div>

    </div>
  
</nav>    

@endcan





        <main class="container  ">
        @include('partials.alerts')
            @yield('content')
        </main>



    </body>
</html>