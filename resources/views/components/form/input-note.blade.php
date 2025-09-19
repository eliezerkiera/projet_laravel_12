@if($inputNote)
    @if(!is_array($inputNote))
        <p class="text-sm text-gray-500 break-words mt-1">{{ $inputNote }}</p>
    @else
        <ul>
              @foreach ($inputNote as $note )
            <li class="text-sm text-gray-500 break-words mt-1">{{ $note }}</li>
            @endforeach
        </ul>
      @endif
@endif
