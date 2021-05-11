<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Unos pacijenata') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

<form method="POST" action='/pacijent'>
<div class="form-group">
<label>Ime i prezime pacijenta</label></br>
<textarea name="name and surname" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none"></textarea>
@if($errors->has('name_and_surname'))
<span class="text-danger">{{$errors->first('name_and_surname')}}</span>
@endif
</div>
<div class="form-group">
<label>Opis</label></br>
<textarea name="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none "></textarea>
@if($errors->has('description'))
<span class="text-danger">{{$errors->first('description')}}</span>
@endif
</div>

<div class="form-group">

<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Dodaj pacijenta</button>
</div>
{{csrf_field()}}
</form>
</div>
</div>
</div>
</x-app-layout>