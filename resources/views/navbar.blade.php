<!DOCTYPE html>
<html>

<head>
    <title>Laravel - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    @vite('resources/css/app.css')
    <style type="text/css">

    </style>
</head>

<body>
    <nav class="border-gray-400 bg-gray-900 custom-nav-height">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2 h-full">
            <div class="hidden  w-full md:block md:w-auto h-full" id="navbar-default">
                <ul
                    class="font-medium flex flex-col justify-center align-content-center p-2 md:p-0 mt-1 border border-gray-100 rounded-lg  md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0  bg-gray-800 md:bg-gray-900 border-gray-700">
                    @guest
                        <li>
                            <a class="block py-2 px-3 text-white  bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0  md:text-blue-500"
                                aria-current="page" href="{{ route('login') }}">Login</a>
                        </li>
                        <li>
                            <a class="block py-2 px-3 text-white text-gray-900 rounded h md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:hover:text-blue-500 hover:bg-gray-700  md:hover:bg-transparent"
                                href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('logout') }}"
                                class="block py-2 px-3 text-white text-gray-900 rounded md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0  md:hover:text-blue-500 hover:bg-gray-700  md:hover:bg-transparent">Logout</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
