@if (!$isWired)
    @if (!empty($errors->all()))
        @php $errorList = $errors->get($name) @endphp
        <div {!! $attributes->merge(['class' => 'text-red-500 text-xs italic']) !!}>
            @if (is_array($errorList))
                <ul>
                    @foreach ($errorList as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @else
                {{ $message }}
            @endif
        </div>
    @endif
@else
    @error($name)
        <div {!! $attributes->merge(['class' => 'text-red-500 text-xs italic']) !!}>
            {{ $message }}
        </div>
    @enderror
@endif
