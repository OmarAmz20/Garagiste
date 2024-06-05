<div style="" class="confirmDeleteVehicle text-white flex flex-col gap-5 p-5 border border-b-2 rounded-xl justify-between">
    <h3>id : <span class="text text-red-600">{{ $vehicule->id }}</span> </h3>
    <h3>Nom : <span class="text text-red-600"> {{ $vehicule->marque }} {{ $vehicule->model }}</span> </h3>
    <h3>Confirmation deletion</h3>
    <div>
        <button class="btnClose bg-green-500 hover:bg-green-600 px-5 py-2 rounded-xl">close</button>
        <button v="{{ $vehicule->id }}" class="confirm bg-red-500 hover:bg-red-600 px-5 py-2 rounded-xl">confirm</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".btnClose").on("click", function() {
            $(".confirmDeleteVehicle").hide();
        });

        $(".confirm").on("click", function() {
            const id = $(this).attr("v");
            axios.post("{{route('vehicule.ConfirmDelete')}}", {id: id})
                .then((res) => {
                    alert(res.data);
                    $(".confirmDeleteVehicle").hide();
                    $("#"+id).remove();
                    // Optionally refresh the list of vehicles or provide feedback to the user
                })
                .catch((error) => {
                    console.error('There was an error!', error);
                    if (error.response) {
                        alert('Error: ' + error.response.data.message);
                    } else {
                        alert('An unknown error occurred.');
                    }
                });
        });
    });
</script>
