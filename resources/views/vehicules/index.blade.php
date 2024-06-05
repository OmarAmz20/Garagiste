@extends('dashboard')
@section('content')
    @if (session('role') == 'client')
        <div>
            <button type="button" id="btnAddVehicle"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800 my-2 h-14 mx-auto w-64 flex justify-center items-center">
                Add Vehicule
            </button>
        </div>
    @endif
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right  text-white">
            <thead class="text-xs uppercase bg-gray-700 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Marque
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Model
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type Carburant
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Immatriculation
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Photo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicules as $vehicule)
                    <tr id="{{ $vehicule->id }}" class=" border-b bg-gray-800 border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-white">
                            {{ $vehicule->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $vehicule->marque }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $vehicule->model }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $vehicule->typeCarburant }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $vehicule->immatriculation }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($vehicule->photos)
                                <img src="{{ asset($vehicule->photos) }}" alt="{{ $vehicule->marque }}" width="200px"
                                    height="200px">
                            @else
                                No image available
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <button v="{{ $vehicule->id }}" type="button"
                                class="updateVehicle focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:ring-green-800 w-32 flex justify-center">
                                Update
                            </button>
                            <button v="{{ $vehicule->id }}" type="button"
                                class="deleteVehicle focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-red-600 hover:bg-red-700 focus:ring-red-900 w-32 flex justify-center">
                                Delete
                            </button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $("#btnAddVehicle").on("click", function() {
            axios.get("{{ route('vehicule.addVehicle') }}").then((result) => {
                $(".addModal").html(result.data);
            })
        })
        $(".deleteVehicle").on("click", function() {
            const id = $(this).attr("v");
            axios.post("{{ route('vehicule.deleteVehicle') }}", {
                id
            }).then((result) => {
                $(".deleteModal").html(result.data)
            })
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        })
        $(".updateVehicle").on("click", function() {
            const id = $(this).attr("v");
            axios.post("{{ route('vehicule.updateVehicule') }}", {
                id
            }).then((result) => {
                $(".modifymodal").html(result.data)

            })
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        })
    </script>
@endsection
