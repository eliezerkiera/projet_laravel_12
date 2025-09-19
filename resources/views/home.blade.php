@extends('layouts.app')


@section('content')

@auth
    connecté
@endauth
@guest
    non connecté
@endguest

<div class="min-h-screen flex items-center justify-center bg-base-200 p-4">
  <div class="card w-full max-w-md shadow-2xl bg-base-100">
    <div class="card-body">
      <h2 class="text-2xl font-bold text-center mb-6">Créer un compte</h2>

      {{-- Message de succès --}}

      <div class="alert alert-success shadow-lg mb-4">
        <div>
          <span>le formulaire a ete soumis</span>
        </div>
      </div>

 <form method="POST" action="{{ route('register') }}" class="space-y-4" x-data="formComponent()">
        @csrf

        {{-- Nom complet --}}
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text font-semibold">Nom complet</span>
          </label>
          <input type="text" name="name" placeholder="Ex: Eliezer Kiera"
                 class="input input-bordered w-full focus:border-primary focus:ring-1 focus:ring-primary/30 transition-colors duration-150 @error('name') input-error @enderror"
                 value="{{ old('name') }}" />
          <p class="text-sm text-gray-500 break-words mt-1">
            Votre nom tel qu'il apparaît sur vos documents.
          </p>
          @error('name')
          <p class="text-sm text-error mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Email --}}
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text font-semibold">Adresse Email</span>
          </label>
          <input type="email" name="email" placeholder="exemple@mail.com"
                 class="input input-bordered w-full focus:border-primary focus:ring-1 focus:ring-primary/30 transition-colors duration-150 @error('email') input-error @enderror"
                 value="{{ old('email') }}" />
          <p class="text-sm text-gray-500 break-words mt-1">
            Nous n'utiliserons jamais votre email à d'autres fins.
          </p>
          @error('email')
          <p class="text-sm text-error mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Mot de passe --}}
        <div class="form-control w-full" x-data="{ showPassword: false }">
          <label class="label">
            <span class="label-text font-semibold">Mot de passe</span>
          </label>
          <div class="relative">
            <input type="password" name="password"
                   class="input input-bordered w-full pr-10 focus:border-primary focus:ring-1 focus:ring-primary/30 transition-colors duration-150 @error('password') input-error @enderror"
                   x-bind:type="showPassword ? 'text' : 'password'" />
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
          <p class="text-sm text-gray-500 break-words mt-1">
            8 caractères minimum pour sécuriser votre compte.
          </p>
          @error('password')
          <p class="text-sm text-error mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Select --}}
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text font-semibold">Choisissez votre rôle</span>
          </label>
          <select name="role"
                  class="select select-bordered w-full focus:border-primary focus:ring-1 focus:ring-primary/30 transition-colors duration-150 @error('role') input-error @enderror">
            <option disabled selected>-- Sélectionnez --</option>
            <option value="etudiant" {{ old('role')=='etudiant' ? 'selected' : '' }}>Étudiant</option>
            <option value="professeur" {{ old('role')=='professeur' ? 'selected' : '' }}>Professeur</option>
            <option value="developpeur" {{ old('role')=='developpeur' ? 'selected' : '' }}>Développeur</option>
          </select>
          <p class="text-sm text-gray-500 break-words mt-1">
            Votre rôle principal sur la plateforme.
          </p>
          @error('role')
          <p class="text-sm text-error mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Textarea --}}
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text font-semibold">Description</span>
          </label>
          <textarea name="description"
                    placeholder="Parlez-nous de vous..."
                    class="textarea textarea-bordered w-full focus:border-primary focus:ring-1 focus:ring-primary/30 transition-colors duration-150 @error('description') textarea-error @enderror">{{ old('description') }}</textarea>
          <p class="text-sm text-gray-500 break-words mt-1">
            Vous pouvez nous dire quelques informations supplémentaires sur vous.
          </p>
          @error('description')
          <p class="text-sm text-error mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Checkbox --}}
        <div class="form-control">
          <label class="cursor-pointer label">
            <span class="label-text">J'accepte les conditions d'utilisation</span>
            <input type="checkbox" name="terms" class="checkbox checkbox-primary" {{ old('terms') ? 'checked' : '' }} />
          </label>
          @error('terms')
          <p class="text-sm text-error mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Bouton --}}
        <div class="form-control mt-4">
          <button type="submit" class="btn btn-primary w-full">S'inscrire</button>
        </div>

      </form>

    </div>
  </div>
</div>

<script>
function formComponent() {
    return {
        showPassword: false,
    }
}
</script>


<x-form.form method='post' action="/index.php" class="space-y-4">
<x-form.textarea name='textarea' label="le label du textarea" input-note="la note du champ"></x-form.textarea>


<x-form.select name="select" label="label du select" :options="$options" input-note="la note du champ"/>


<x-form.checkbox name="checkbox" label="label du checkbox" input-note="la note du champ"/>

<x-form.input type="text" name="text" label="label du text" default-value="dkdkdkdkdkdkdkd" input-note="la note du champ"/>
<x-form.input type="password" name="password" label="label du password" input-note="la note du champ"/>


<x-form.submit>envoyer</x-form.submit>

</x-form.form>

@endsection
