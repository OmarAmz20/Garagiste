<div style="" class="deleteClient text-white flex flex-col gap-5 p-5 border border-b-2 rounded-xl justify-between">


    <h3>id : <span class="text text-red-600">{{ $client->id }}</span> </h3>


    <h3>Nom : <span class="text text-red-600"> {{ $client->nom }} {{ $client->prenom }}</span> </h3>


    <h3>Confirmation deletion</h3>

    <div>
        <button class="closebtn bg-green-500 hover:bg-green-600 px-5 py-2 rounded-xl">
            close
        </button>
        <button v="{{ $client->id }}" class="confirm bg-red-500 hover:bg-red-600 px-5 py-2 rounded-xl">
            confirm
        </button>

    </div>

</div>
<script>
    $(".closebtn").on("click", function() {
        $(".deleteClient").hide()
    })
    $(".confirm").on("click", function() {
        const id = $(this).attr("v")
        axios.post("{{ route('modal.ConfirmDelete') }}", {
            id
        }).then(() => {
            $("#" + id).hide()
            $(".deleteClient").hide()
        })
    })
</script>
