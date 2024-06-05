<form action="{{ route('repair.createRepair') }}" method="POST" id="createRepair" style="width:600px;height:600px"
    class="flex flex-col border p-2 ps-2 items-center gap-10 justify-evenly">
    @csrf
    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div class="">
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">
                Description</label>
            <input style="height: 35px" type="text" name="description"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="" required />
        </div>
        <div class="">
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">
                Statut</label>
            <select name="statut" id=""
                class="w-90 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                <option value="en attente">en attente
                </option>
                <option value="en cours">en cours
                </option>
                <option value="terminée">terminée
                </option>
            </select>
        </div>

    </div>
    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">
                Date begin</label>
            <input style="height: 35px" type="date" name="date_debut"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="" required />
        </div>
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">
                Date End</label>
            <input style="height: 35px" type="date" name="date_fin"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="" required />
        </div>

    </div>

    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">
                Vehicle </label>
            <select name="id_vehicule" id=""
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                @foreach ($vehicules as $vehicule)
                    <option value="{{ $vehicule->id }}">{{ $vehicule->id }} - {{ $vehicule->marque }}
                        {{ $vehicule->model }}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div class="">
            <button id="closeAddModal" type="button"
                class="closebtn text-white w-32 bg-green-500 hover:bg-green-600 px-5 py-2 rounded-xl">
                close
            </button>
        </div>
        <div>
            <button type="submit"
                class=" text-white w-32 closebtn bg-blue-500 hover:bg-blue-600 px-5 py-2 rounded-xl flex justify-center">
                Create
            </button>
        </div>
    </div>

</form>
<script>
    $(".closebtn").on("click", function() {
        $("#createRepair").hide()
    })
</script>
