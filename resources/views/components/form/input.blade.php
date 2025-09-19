@if ($type=="password")
    <div class="form-control w-full" x-data="{ showPassword: false }">
    <x-form.label :label="$label" :for="$id" class="block"/>
    <div class="relative">
        <!-- Input password -->
        <input
            x-bind:type="showPassword ? 'text' : 'password'"
            name="{{ $name }}"
            id="{{ $id }}"
            value="{{ $value }}"
            {{$attributes->class(['input input-bordered w-full pr-10 focus:border-primary focus:ring-1 focus:ring-primary/30 transition-colors duration-150','input-error'=>$hasError])}}

        />

        <!-- SVG toggle -->
         <button type="button"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500"
                    x-on:click="showPassword = !showPassword">
              <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                   fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                   fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 012.01-3.368m3.3-2.266A9.977 9.977 0 0112 5c4.477 0 8.268 2.943 9.542 7-.409 1.303-1.1 2.493-2.01 3.368M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 3l18 18" />
              </svg>
            </button>
        </div>
    </div>
     @if($inputNote)
            <x-form.input-note input-note="{{ $inputNote }}"/>
            @endif
  @if ($showErrors)
  <x-form.errors :name="$name" :is-wired="$isWired" />
@endif
</div>



@elseif ($type=="hidden")

<input type="hidden" name="{{ $name }}" value="{{ $value }}"/>

@else
<div class="form-control w-full">
    <x-form.label :label="$label" :for="$id" class="block"/>

     <input
            name="{{$name}}"
            id="{{$id}}"
            value="{{ $value }}"

            {{$attributes->class(['input input-bordered w-full focus:border-primary focus:ring-1 focus:ring-primary/30 transition-colors duration-150', 'input-error'=>$hasError])}}
            />
     @if($inputNote)
            <x-form.input-note input-note="{{ $inputNote }}"/>
            @endif

       @if ($showErrors)
            <x-form.errors :name="$name" :is-wired="$isWired" />
          @endif
</div>
@endif
