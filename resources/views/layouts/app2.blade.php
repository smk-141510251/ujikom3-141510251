<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>penggajian</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	 <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                      
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
<body>

	<div id="header">
		
			<ul id="navigation">
			<li class="selected">
					<a href="{{ url('/home') }}">home</a>
				</li>
				<li>
					<a href="{{ url('/Jabatan') }}">jabatan</a>
				</li>
				<li>
					<a href="{{ url('/Golongan') }}">Golongan</a>
				</li>
				<li>
					<a href="{{ url('/Kategori') }}">Kategori lembur</a>
				</li>
				<li>
					<a href="{{ url('/Pegawai') }}">Pegawai</a>
				</li>
				<li>
					<a href="{{ url('/Lembur') }}">Lembur Pegawai</a>
				</li>
				<li>
				<a href="{{ url('/Tunjangan') }}">Tunjangan</a>
				</li>
				<li>
				<a href="{{ url('/TunjanganP') }}">Tunjangan Pegawai</a>
				</li>
				<li>
				<a href="{{ url('/Penggajians') }}">Penggajian</a>
				</li>
				<li>

				
			</ul>
		</div>
	</div>
	
	
		
		
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>