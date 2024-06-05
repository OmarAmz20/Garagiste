<form  action="{{ route('spareParts.confirmUpdate') }}" id="modifySparePart" style="width: 600px;height:600px" method="POST" class="flex flex-col border p-2 ps-2 items-center gap-10 justify-evenly">
    @csrf
    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div class="">
            <label for="nom_piece" class="block mb-2 text-sm font-medium text-gray-900 text-white">Piece name</label>
            <input style="height: 35px" type="text" name="nom_piece" value="{{ $sparePart->nom_piece }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                required />
        </div>
    </div>

    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div class="">
            <label for="reference_piece" class="block mb-2 text-sm font-medium text-gray-900 text-white">Reference</label>
            <input style="height: 35px" type="text" name="reference_piece" value="{{ $sparePart->reference_piece }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                required />
        </div>
    </div>
    <div>
        <label for="fournisseur" class="block mb-2 text-sm font-medium text-gray-900 text-white">Supplier</label>
        <input style="height: 35px" type="text" name="fournisseur" value="{{ $sparePart->fournisseur }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
            required />
    </div>

    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div>
            <label for="prix" class="block mb-2 text-sm font-medium text-gray-900 text-white">Price</label>
            <input style="height: 35px" type="text" name="prix" value="{{ $sparePart->prix }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                required />
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
        $("#modifySparePart").hide();
    });
</script>
