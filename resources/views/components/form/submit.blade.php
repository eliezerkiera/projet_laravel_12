

<div class="form-control mt-4">
        <button
            type="submit"
            {!! $attributes->merge(['class'=>"btn btn-primary w-full"]) !!}
            >
            {!! trim($slot) ?: __('Submit') !!}
        </button>
    </div>
