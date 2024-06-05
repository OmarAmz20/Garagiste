@extends('dashboard')
@section('content')
    @if (session('role') == 'Admin')
        <div>
            <button type="button" id="btnAddSparePart"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800 my-2 h-14 mx-auto w-64 flex justify-center items-center">
                Add Spare Part
            </button>
        </div>
    @endif
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-white">
            <thead class="text-xs  uppercase text-white bg-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Piece
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Reference
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Supplier
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spareParts as $sparePart)
                    <tr id="{{ $sparePart->id }}" class=" border-b bg-gray-800 border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-white">
                            {{ $sparePart->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $sparePart->nom_piece }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $sparePart->reference_piece }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $sparePart->fournisseur }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $sparePart->prix }}
                        </td>
                        <td class="px-6 py-4">
                            <button v="{{ $sparePart->id }}" type="button"
                                class="btnupdateSparePart focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:ring-green-800 w-32 flex justify-center">
                                Update
                            </button>
                            @if (session('role') == 'Admin')
                                <button v="{{ $sparePart->id }}" type="button"
                                    class="btndeleteSparePart focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-red-600 hover:bg-red-700 focus:ring-red-900 w-32 flex justify-center">
                                    Delete
                                </button>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $("#btnAddSparePart").on("click", function() {
            axios.get("{{ route('spareParts.add') }}").then((res) => {
                $(".addModal").html(res.data)
            })
        })
        $(".btnupdateSparePart").on("click", function() {
            const id = $(this).attr("v")
            axios.post("{{ route('spareParts.update') }}", {
                id
            }).then((res) => {
                $(".modifymodal").html(res.data)
            })
        })
        $(".btndeleteSparePart").on("click", function() {
            const id = $(this).attr("v")
            axios.post("{{ route('spareParts.delete') }}", {
                id
            }).then((res) => {
                $(".deleteModal").html(res.data)
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            })
        })
    </script>
@endsection
