<div class="form-control">

     <x-form.label :label="$label" :for="$id" class="block"/>
 <select
    name="{{$name}}"
    id="{{$id}}"
    {{$attributes->class(['select', 'select-bordered', 'input-error'=>$hasError])}}>
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


  @if ($showErrors)
  <x-form.errors :name="$name" :is-wired="$isWired" />
@endif
</div>


