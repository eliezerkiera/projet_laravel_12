<div class="form-control w-full">

     <x-form.label :label="$label" :for="$id" class="block"/>
 <select
    name="{{$name}}"
    id="{{$id}}"
    {{$attributes->class(['select select-bordered w-full focus:border-primary focus:ring-1 focus:ring-primary/30 transition-colors duration-150', 'input-error'=>$hasError])}}>
    <option value="" @selected(empty($value))>{{$placeholder}}</option>
    @if($withOptgroup)
        @foreach($options as $key=>$option)
            <optgroup label="{{$option['value']}}">

                @foreach ($option['children'] as $subKey=>$subOption)
                    <option value="{{$subKey}}" @selected($value==$subKey)>{{$subOption}}</option>
                @endforeach

            </optgroup>
        @endforeach

    @else
        @foreach ($options as $key=>$option)
            <option value="{{$key}}" @selected($key==$value)>{{$option}}</option>
        @endforeach
    @endif
  </select>
     @if($inputNote)
            <x-form.input-note input-note="{{ $inputNote }}"/>
            @endif

  @if ($showErrors)
  <x-form.errors :name="$name" :is-wired="$isWired" />
@endif
</div>


