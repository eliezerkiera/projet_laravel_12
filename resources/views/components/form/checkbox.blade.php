<div class="form-control">
    <div>
        <input
            {{$attributes->class(['checkbox','input-error'=>$hasError])}}
            name="{{$name}}"
            type="checkbox"
            id="{{$id}}"
            value="{{$value}}"
            @checked($isChecked) />


        <x-form.label :label="$label" :for="$id"/>

    </div>
    @if ($showErrors)
        <x-form.errors :name="$name" :is-wired="$isWired" />
    @endif
</div>
