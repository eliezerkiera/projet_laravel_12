<div class="form-control">

            <x-form.label :label="$label" :for="$id" class="block"/>


         <textarea
            name="{{$name}}"
            id="{{$id}}"

            {{$attributes->class(['textarea', 'textarea-bordered', 'input-error'=>$hasError])}}
            >{{$value}}</textarea>

            @if ($showErrors)
            <x-form.errors :name="$name" :is-wired="$isWired" />
          @endif
</div>
