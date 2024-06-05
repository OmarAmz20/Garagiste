<form onsubmit="" action="{{ route('vehicule.ConfirmUpdate') }}" id="modifyVehicle" style="width: 600px;height:600px" method="POST" enctype="multipart/form-data" class="flex flex-col border p-2 ps-2 items-center gap-10 justify-evenly">
    @csrf
    <input type="hidden" name="id" value="{{ $vehicule->id }}">

    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div class="">
            <label for="marque" class="block mb-2 text-sm font-medium text-gray-900 text-white">Mark</label>
            <input style="height: 35px" type="text" name="marque" value="{{ $vehicule->marque }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                required />
        </div>
        <div>
            <label for="model" class="block mb-2 text-sm font-medium text-gray-900 text-white">Model</label>
            <input style="height: 35px" type="text" name="model" value="{{ $vehicule->model }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                required />
        </div>
    </div>

    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div class="">
            <label for="typeCarburant" class="block mb-2 text-sm font-medium text-gray-900 text-white">Fuel type</label>
            <input style="height: 35px" type="text" name="typeCarburant" value="{{ $vehicule->typeCarburant }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                required />
        </div>
        <div>
            <label for="immatriculation" class="block mb-2 text-sm font-medium text-gray-900 text-white">Registration number</label>
            <input style="height: 35px" type="text" name="immatriculation" value="{{ $vehicule->immatriculation }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                required />
        </div>
    </div>

    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div class="">
            <label for="photos" class="block mb-2 text-sm font-medium text-gray-900 text-white">Photo</label>
            <input style="height: 35px" type="file" name="photos"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 text-gray-400 focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400"
                id="photos" />
        </div>
    </div>

    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div class="">
            <button id="closeModifyModel" type="button" class="closebtn text-white w-32 bg-green-500 hover:bg-green-600 px-5 py-2 rounded-xl">
                close
            </button>
        </div>
        <div>
            <button type="submit" class="text-white w-32 closebtn bg-blue-500 hover:bg-blue-600 px-5 py-2 rounded-xl flex justify-center">
                update
            </button>
        </div>
    </div>
</form>

<script>
    $("#closeModifyModel").on("click", function() {
        $("#modifyVehicle").hide();
    });
</script>
