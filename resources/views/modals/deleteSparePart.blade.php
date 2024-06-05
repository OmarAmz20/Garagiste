<div style="" class="deleteSparePart text-white flex flex-col gap-5 p-5 border border-b-2 rounded-xl justify-between">


    <h3>id : <span class="text text-red-600">{{ $sparePart->id }}</span> </h3>


    <h3>Nom : <span class="text text-red-600"> {{$sparePart->nom_piece}}</span> </h3>


    <h3>Confirmation deletion</h3>

    <div>
        <button class="closebtn bg-green-500 hover:bg-green-600 px-5 py-2 rounded-xl">
            close
        </button>
        <button v="{{ $sparePart->id }}" class="confirm bg-red-500 hover:bg-red-600 px-5 py-2 rounded-xl">
            confirm
        </button>

    </div>

</div>
<script>
    $(".closebtn").on("click",function () {
        $(".deleteSparePart").hide()
    })
    $(".confirm").on("click",function() {
        const id = $(this).attr("v")
        axios.post("{{route('spareParts.confirmDelete')}}",{id}).then((res) => {
            alert(res.data)
            $("#"+id).remove();
            $(".deleteSparePart").hide()
        })
    })
</script>
