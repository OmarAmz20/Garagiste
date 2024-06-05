@extends('dashboard')
@section('content')
    <div>
        @if (session("role") == "Michanic")
        <button type="button" id="btnCreateRepair"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800 my-2 h-14 mx-auto w-64 flex justify-center items-center">
            Add Repair
        </button>

        @endif
    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-white">
            <thead class="text-xs  uppercase bg-gray-50 bg-gray-700 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Statut
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date Begin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date End
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Note Mechanic
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Note Client
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Vehicle
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reparations as $reparation)
                    <tr id="{{ $reparation->id }}" class=" border-b bg-gray-800 border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-white">
                            {{ $reparation->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $reparation->description }}
                        </td>
                        <td class=" py-4">
                            @if ($user->id == $reparation->id_mecanicien)
                                <select name="statut" id="" v="{{$reparation->id}}"
                                    class="statut bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                    <option @if ($reparation->statut == 'en attente') selected @endif value="en attente">en attente
                                    </option>
                                    <option @if ($reparation->statut == 'en cours') selected @endif value="en cours">en cours
                                    </option>
                                    <option @if ($reparation->statut == 'terminée') selected @endif value="terminée">terminée
                                    </option>
                                </select>
                            @else
                                {{ $reparation->statut }}
                            @endif
                        </td>
                        <td class=" py-4">
                            {{ $reparation->date_debut }}
                        </td>
                        <td class=" py-4">
                            {{ $reparation->date_fin }}
                        </td>
                        <td class="px-1 py-4">
                            <textarea v={{$reparation->id}} style="max-height: 200px;min-height:100px" @if ($reparation->id_mecanicien !== $user->id) readonly @endif  name="notes_mecanicien" id="" cols="50" rows="5" class="note_michanic bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                {{ $reparation->notes_mecanicien }}
                            </textarea>
                        </td>
                        <td class="px-1 py-4">
                            <textarea v={{$reparation->id}} style="max-height: 200px;min-height:100px"  @if ( $reparation->vehicule->client_id !== $client_id) readonly @endif  name="notes_client" id="" cols="50" rows="5" class="notes_client w-64 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                {{ $reparation->notes_client }}
                            </textarea>
                        </td>
                        <td class="px-6 py-4">
                            {{ $reparation->vehicule->marque }} - {{ $reparation->vehicule->model }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $("#btnCreateRepair").on("click", function() {
            axios.get("{{ route('repair.createRepair') }}").then((result) => {
                $(".addModal").html(result.data)
            })
        })

        $(".statut").on("change",function () {
            const id = $(this).attr("v");
            const statut = $(this).val();
            axios.post("{{route('repair.modifyStatus')}}",{id,statut})
        })
        $(".note_michanic").on("blur",function () {
            const id = $(this).attr("v");
            const notes_mecanicien = $(this).val();
            if (confirm("You want update it ?")) {
                axios.post("{{route('repair.modifyNote_Michanic')}}",{id,notes_mecanicien})
            }else {
                $(this).val("");
            }
        })
        $(".notes_client").on("blur",function () {
            const id = $(this).attr("v");
            const notes_client = $(this).val();
            const v = confirm("You want update it ?")
            if (v) {
                axios.post("{{route('repair.modifyNote_Client')}}",{id,notes_client})
            }else {
                $(this).val("");
            }
        })
    </script>
@endsection
