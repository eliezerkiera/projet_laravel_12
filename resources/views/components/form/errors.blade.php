@if (!$isWired)
    @if (!empty($errors->all()))
        @php $errorList = $errors->get($name) @endphp
        <div {!! $attributes->merge(['class' => 'mt-1 text-error text-sm']) !!}>
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
        <div {!! $attributes->merge(['class' => 'mt-1 text-error text-sm']) !!}>
            {{ $message }}
        </div>
    @enderror
@endif
