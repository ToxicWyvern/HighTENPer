<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        <main>
            <section class="hero-container">
            <div class="hero">
                <h1>Welkom bij <br> Formule 1 Registratie</h1>
                <p>Race tegen je vrienden <br> en hou de races bij</p>
                <button>Registreer nu -></button>
            </div>
        </section>
        <div class="leaderboard-heading-primary">
            <h1>Bekijk de races van Abu Dhabi</h1>
        </div>
        <section class="leaderboard-container">
                <div class="leaderboard">
                    <div class="leaderboard-property">
                        <div class="rank">Rank</div>
                        <div class="time">Time</div>
                        <div class="driver">Driver</div>
                        <div class="team">Team</div>
                        <div class="tires">Tires</div>
                    </div>
                    <div class="leaderboard-value">
                        <div class="rank-value"># 1</div>
                        <div class="time-value">1:20:15</div>
                        <div class="driver-value">Niloyan</div>
                        <div class="team-value">Red Bull</div>
                        <div class="tires-value">Hard</div>
                    </div>
                    <div class="leaderboard-value">
                        <div class="rank-value"># 2</div>
                        <div class="time-value">1:31:25</div>
                        <div class="driver-value">Ebram</div>
                        <div class="team-value">Mercedes</div>
                        <div class="tires-value">Hard</div>
                    </div>

                </div>
        </section>
    </main>

    <footer>
        <div class="logo">
            <img src="./public/images/f1registration.png" alt="logo" class="logo-img">
        </div>
    </footer>
        </div>
    </body>
</html>
