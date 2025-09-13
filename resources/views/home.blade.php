@extends('layouts.app')


@section('content')
<x-form.form method='post' action="/index.php">
<x-form.textarea name='textarea' label="le label du textarea"></x-form.textarea>


<x-form.select name="select" label="label du select" :options="$options"/>


<x-form.checkbox name="checkbox" label="label du checkbox"/>

<x-form.input type="text" name="text" label="label du text" default-value="dkdkdkdkdkdkdkd"/>
<x-form.input type="password" name="password" label="label du password"/>
<x-form.submit>envoyer</x-form.submit>

</x-form.form>

<x-form.form method="put">fjfjfjfjfjfjfj</x-form.form>

@endsection
