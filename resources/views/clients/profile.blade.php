@extends("dashboard")
@section("content")
<div style="width: 700px;height:700px;" class="bg-gray-800 flex flex-col justify-evenly   text-white p-6 rounded-lg shadow-md border border-neutral-50 absolute top-2/3 left-1/2 -translate-x-1/2 -translate-y-1/2" >
    <div class="mb-4">
        <h3 class="text-lg font-semibold">Username : {{$user->username}}</h3>
    </div>
    <div class="mb-4">
         <h3 class="text-lg font-semibold">Email : {{$user->email}}</h3>
    </div>
    <div class="mb-4">
        <h3 class="text-lg font-semibold">Role : {{$user->role}}</h3>
    </div>
        <div class="mb-4">
            <h3 class="text-lg font-semibold">First Name : {{$user->client->nom}}</h3>
        </div>
        <div class="mb-4">
            <h3 class="text-lg font-semibold">Last Name : {{$user->client->prenom}}</h3>
        </div>
        <div class="mb-4">
            <h3 class="text-lg font-semibold">Address : {{$user->client->addresse}}</h3>
        </div>
        <div class="mb-4">
            <h3 class="text-lg font-semibold">Phone number : {{$user->client->telephone}}</h3>
        </div>
        <button v="{{$user->client->id}}" type="button" class="btnUpdateClient bg-blue-500 border-zinc-50 border w-32 h-14 rounded-lg hover:bg-blue-600">
            Update
        </button>
</div>
<script>
    $(".btnUpdateClient").on("click", function() {
    try {
        const id = $(this).attr("v");
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
        axios.get("{{ route('client.ModifyModal') }}", { params: { id: id } }).then((result) => {
            $(".modifymodal").html(result.data);
        });
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred while updating the client.');
    }
});
</script>

@endsection
