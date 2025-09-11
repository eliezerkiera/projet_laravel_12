@if($label)
    <label {!! $attributes->merge(['class'=>'label mb-1']) !!}>
        <span class="label-text">{{ $label }}</span>
    </label>
@endif
