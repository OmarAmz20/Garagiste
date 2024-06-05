<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.2/axios.min.js" ></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include("navbar")
    <div class="deleteModal"> </div>
    <div class="addModal"></div>
    <div class="modifymodal"></div>
    <div style="min-height: 800px" class="flex flex-row ">
        <div style="min-height: 800px;height:100%" class="container w-1/5 ms-0  bg-gray-900  ">
            <ul class="flex flex-col gap-10 pt-10">
                @if(session("role") == "Admin")
                <li class="font-medium cursor-pointer flex flex-col justify-center align-content-center p-2 md:p-0  border border-gray-100 rounded-lg  md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0  bg-gray-800 md:bg-gray-900 border-gray-700">
                    <a
                    href="{{route("clients.index")}}"
                    class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 text-white md:text-blue-500">
                        Clients
                    </a>
                </li>
                @endif
                @if (session("role") !== "Michanic")
                <li class="font-medium cursor-pointer flex flex-col justify-center align-content-center p-2 md:p-0  border border-gray-100 rounded-lg  md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0  bg-gray-800 md:bg-gray-900 border-gray-700">
                    <a
                    href="{{route("vehicules.index")}}"
                    class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 text-white md:text-blue-500">
                        Vehicules
                    </a>
                </li>

                @endif
                <li class="font-medium cursor-pointer flex flex-col justify-center align-content-center p-2 md:p-0  border border-gray-100 rounded-lg  md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0  bg-gray-800 md:bg-gray-900 border-gray-700">
                    <a
                    href="{{route('repair.index')}}"
                    class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 text-white md:text-blue-500">
                    Repair
                </a>
            </li>
            @if (session("role") == "client")
            <li class="font-medium cursor-pointer flex flex-col justify-center align-content-center p-2 md:p-0  border border-gray-100 rounded-lg  md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0  bg-gray-800 md:bg-gray-900 border-gray-700">
                <a
                href="{{route("client.profile")}}"
                class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 text-white md:text-blue-500">
                    Profile
                </a>
            </li>

            @endif
                @if (session("role") !== "client")
                <li class="font-medium cursor-pointer flex flex-col justify-center align-content-center p-2 md:p-0  border border-gray-100 rounded-lg  md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0  bg-gray-800 md:bg-gray-900 border-gray-700">
                    <a
                    href="{{route('spareParts.index')}}"
                    class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 text-white md:text-blue-500">
                        Stock
                    </a>
                </li>

                @endif

            </ul>
        </div>
        <div  class="w-4/5">
            @yield("content")
        </div>
    </div>
</body>
</html>
