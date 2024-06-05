
<form  action="" onsubmit="return ModifyClient(event)" id="modifyClient" style="width: 600px;height:600px"
    class="flex flex-col border p-2 ps-2 items-center gap-10 justify-evenly">
    @csrf
    <input  type="hidden" name="id" value="{{$client->id}}" >
    <input type="hidden" name="user_id" value="{{$client->user_id}}" >
    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div class="">
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">First
                name</label>
            <input style="height: 35px" type="text" name="prenom" value="{{$client->prenom}}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="" required />
        </div>
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">Last
                name</label>
            <input style="height: 35px" type="text" name="nom" value="{{$client->nom}}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="" required />
        </div>

    </div>
    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div class="">
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">
                Adresse</label>
            <input style="height: 35px" type="text" name="addresse" value="{{$client->addresse}}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="" required />
        </div>
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">
                telephone</label>
            <input style="height: 35px" type="text" name="telephone" value="{{$client->telephone}}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="" required />
        </div>
    </div>

    <hr class="bg bg-slate-50 w-full ">

    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div class="">
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">
                Username</label>
            <input style="height: 35px" type="text" name="username" value="{{$user->username}}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="" required />
        </div>
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">
                Email</label>
            <input style="height: 35px" type="email" name="email" value="{{$user->email}}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="" required />
        </div>
    </div>
    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div class="">
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">
                Password</label>
            <input style="height: 35px" type="password" name="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder=""  />
        </div>
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">
                Role</label>
            <input style="height: 35px" type="text" readonly value="client" name="role"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="" required />
        </div>
    </div>
    <div class="flex flex-row w-full gap-10 justify-evenly">
        <div class="">
            <button id="closeModifyModal" type="button"
                class="closebtn text-white w-32 bg-green-500 hover:bg-green-600 px-5 py-2 rounded-xl">
                close
            </button>
        </div>
        <div>
            <button type="submit" class="flex justify-center text-white w-32 closebtn bg-blue-500 hover:bg-blue-600 px-5 py-2 rounded-xl">
                Update
            </button>
        </div>
    </div>

</form>
<script>
        $("#closeModifyModal").on("click", function() {
        $("#modifyClient").hide()
    })
    async function ModifyClient(event) {
    event.preventDefault();

    // Serialize form data
    const data = $("#modifyClient").serialize();

    try {
        // Envoyer une requête POST avec axios
        const response = await axios.post("{{ route('client.updateClient') }}", data);

        // Masquer le formulaire si la requête est réussie
        $("#modifyClient").hide();

        // Vous pouvez ajouter un message de succès ici, si besoin
        alert('Client updated successfully!');
        window.location.reload()
    } catch (error) {
        // Gestion des erreurs
        console.error('There was an error!', error);

        // Afficher un message d'erreur
        if (error.response) {
            const responseData = error.response.data;
            if (responseData && responseData.message) {
                alert('An error occurred: ' + responseData.message);
            } else {
                alert('An unknown error occurred.');
            }
        } else {
            alert('An unknown error occurred.');
        }
    }
}
</script>
