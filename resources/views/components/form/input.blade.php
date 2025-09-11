@if ($type=="password")
    <div class="form-control" x-data="{ show: false }">
    <x-form.label :label="$label" :for="$id" class="block"/>
    <div class="relative">
        <!-- Input password -->
        <input
            x-bind:type="show ? 'text' : 'password'"
            name="{{ $name }}"
            id="{{ $id }}"
            value="{{ $value }}"
            {{$attributes->class(['input', 'input-bordered','w-full','pr-10' ,'input-error'=>$hasError])}}

        />

        <!-- SVG toggle -->
        <div class="absolute inset-y-0 right-2 flex items-center cursor-pointer" x-on:click="show = !show">
            <template x-if="!show">
                <!-- Icone oeil fermé -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-5.523 0-10-4.477-10-10 0-1.03.152-2.024.437-2.95M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </template>
            <template x-if="show">
                <!-- Icone oeil ouvert -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </template>
        </div>
    </div>

  @if ($showErrors)
  <x-form.errors :name="$name" :is-wired="$isWired" />
@endif
</div>



@else
<div class="form-control">
    <x-form.label :label="$label" :for="$id" class="block"/>

     <input
            name="{{$name}}"
            id="{{$id}}"
            value="{{ $value }}"

            {{$attributes->class(['input', 'input-bordered', 'input-error'=>$hasError])}}
            />


       @if ($showErrors)
            <x-form.errors :name="$name" :is-wired="$isWired" />
          @endif
</div>
@endif
