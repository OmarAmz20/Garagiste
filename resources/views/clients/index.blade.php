@extends("dashboard")
@section("content")
<div>
    <button
    type="button"
    id="btnAddClient"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800 my-2 h-14 mx-auto w-64 flex justify-center items-center">
        Add client
    </button>
</div>

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-white">
        <thead class="text-xs text-white uppercase bg-gray-50 bg-gray-700 text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Prenom
                </th>
                <th scope="col" class="px-6 py-3">
                    Adress
                </th>
                <th scope="col" class="px-6 py-3">
                    Telephone
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client )
            <tr id="{{$client->id}}" class=" border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-white">
                    {{$client->id}}
                </th>
                <td class="px-6 py-4">
                    {{$client->nom}}
                </td>
                <td class="px-6 py-4">
                    {{$client->prenom}}
                </td>
                <td class="px-6 py-4">
                    {{$client->addresse}}
                </td>
                <td class="px-6 py-4">
                    {{$client->telephone}}
                </td>
                <td class="px-6 py-4">
                    <button
                    v="{{$client->id}}"
                    type="button"
                    class="btnUpdateClient focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:ring-green-800 w-32 flex justify-center">
                        Update
                    </button>
                    <button
                    v="{{$client->id}}"
                    type="button"
                    class="deletebtn focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-red-600 hover:bg-red-700 focus:ring-red-900 w-32 flex justify-center">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
$(".deletebtn").on("click",function() {
    const id = $(this).attr("v")
    axios.post("{{route('modal.delete')}}",{id}).then((result) => {
        $(".deleteModal").html(result.data);
    })
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
})
$("#btnAddClient").on("click",function() {
    axios.get("{{route('client.add')}}").then((result) => {
        $(".addModal").html(result.data);
    })
})
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
