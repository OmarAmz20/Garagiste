<form  id="addSparePart" style="width: 600px;height:600px"  method="POST" action="{{route('spareParts.create')}}"
    enctype="multipart/form-data" class="flex flex-col border p-2 ps-2 items-center gap-10 justify-evenly">
    @csrf
    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div class="">
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">nom_piece</label>
            <input style="height: 35px" type="text" name="nom_piece"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="" required />
        </div>
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">
                reference_piece
            </label>
            <input style="height: 35px" type="text" name="reference_piece"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="" required />
        </div>

    </div>
    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">
                fournisseur</label>
            <input style="height: 35px" type="text" name="fournisseur"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="" required />
        </div>
        <div class="">
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">
                prix</label>
            <input style="height: 35px" type="text" name="prix"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 text-gray-400 focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400"
                 placeholder="" required />
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
            <button type="submit" class=" text-white w-32 closebtn bg-blue-500 hover:bg-blue-600 px-5 py-2 rounded-xl">
                add
            </button>
        </div>
    </div>
<script>
    $("#closeAddModal").on("click",function () {
        $("#addSparePart").hide()
    })
</script>
</form>
