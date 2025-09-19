<div class="form-control w-full">

            <x-form.label :label="$label" :for="$id" class="block"/>


         <textarea
            name="{{$name}}"
            id="{{$id}}"

            {{$attributes->class(['textarea textarea-bordered w-full focus:border-primary focus:ring-1 focus:ring-primary/30 transition-colors duration-150', 'input-error'=>$hasError])}}
            >{{$value}}</textarea>

            @if($inputNote)
            <x-form.input-note input-note="{{ $inputNote }}"/>
            @endif

            @if ($showErrors)
            <x-form.errors :name="$name" :is-wired="$isWired" />
          @endif
</div>
