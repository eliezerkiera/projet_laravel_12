<div>
    <x-form.label :label="$label" :for="$id" class="form-label"/>

    <textarea
            name="{{$name}}"
            id="{{$id}}"

            {{$attributes->class(['form-control', 'is-invalid'=>$hasError])}}
            >{{$value}}</textarea>

            @if ($showErrors)
            <x-form.errors :name="$name" :is-wired="$isWired" />
          @endif
</div>
