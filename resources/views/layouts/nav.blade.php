<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/threads') }}">
            {{ config('app.name', 'Laravel') }}
        </a>



        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">


                <li class="nav-item dropdown">
                    <a class=" dropdown-toggle navbar-brand" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Browse
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <ul>
                            <li><a class="navbar-brand" href="/threads">All Threads</a></li>
                            <li><a class="navbar-brand" href="/threads?popular=1">Popular All Time</a></li>
                            <li><a class="navbar-brand" href="/threads?unanswered=1">Unanswered Threads</a></li>

                            @if(auth()->check())
                                <li><a class="navbar-brand" href="/threads?by={{auth()->user()->name}}">My threads</a></li>
                            @endif
                        </ul>
                    </div>
                </li>
                <li><a  class="navbar-brand" href="/threads/create" >New Thread</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Channels
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($channels as $channel)
                            <a class="dropdown-item" href="/threads/{{$channel->slug}}">{{$channel->name}}</a>
                        @endforeach
                    </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                    <user-notifications></user-notifications>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('profile', Auth::user())}}">
                                {{__('My Profile')}}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
