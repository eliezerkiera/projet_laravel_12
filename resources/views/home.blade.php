@extends('layouts.app')


@section('content')
<x-form.form method='post' action="/index.php">
<x-form.textarea name='textarea' label="le label du textarea"></x-form.textarea>


 <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                S’inscrire
            </button>
</x-form.form>



@endsection
