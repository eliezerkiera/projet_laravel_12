<div class="form-control">
    <div>
        <input
            {{$attributes->class(['checkbox checkbox-primary','input-error'=>$hasError])}}
            name="{{$name}}"
            type="checkbox"
            id="{{$id}}"
            value="{{$value}}"
            @checked($isChecked) />


        <x-form.label :label="$label" :for="$id"/>

    </div>
         @if($inputNote)
            <x-form.input-note input-note="{{ $inputNote }}"/>
            @endif
    @if ($showErrors)
        <x-form.errors :name="$name" :is-wired="$isWired" />
    @endif
</div>
