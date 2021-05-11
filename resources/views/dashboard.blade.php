<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vakcinacija') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <div class="flex">
               <div class="flex-auto text-2xl mb-4">Pacijenti lista</div>

               <div class="flex-auto text-right mt-2">
               <a href="/pacijent" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Dodaj novog pacijenta</a>
               </div>
               </div>
               <table class="w-full text-md rounded mb-4">
               <thead>
               <tr class="border-b">
               <th class="text-left p-3 px-5">Ime i prezime pacijenta</th>
               <th class="text-left p-3 px-5">Opis</th>
               <th class="text-left p-3 px-5">Operacije</th>
               <th></th>
               </tr>
               </thead>
               <tbody>
               @foreach(auth()->user()->pacijents as $pacijent)
               <tr class="border-b hover:bg-orange-100">
               <td class="p-3 px-5">
               {{$pacijent->name_and_surname}}
                </td>
              
               <td class="p-3 px-5">
               {{$pacijent->description}}
                </td>
                <td class="p-3 px-5">
              <a href="/pacijent/{{$pacijent->id}}" name="edit" class="mr-3 text-sm bg-blue-500 py-2 px-4">Izmeni</a>
                <form action="/pacijent/{{$pacijent->id}}" class="inline-block">
                <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-white py-2 px-4">Obriši</button>
                {{csrf_field()}}

                </form>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                </div>







            </div>
        </div>
    </div>
</x-app-layout>
