@if($label)
    <label {!! $attributes->merge(['class'=>'label mb-1']) !!}>
        <span class="label-text font-semibold">{{ $label }}</span>
    </label>
@endif
