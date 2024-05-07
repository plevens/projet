<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'profilInformation')" id="defaultOpen">Profil Information</button>
        <button class="tablinks" onclick="openCity(event, 'updatePassword')">Update Password</button>
        <button class="tablinks" onclick="openCity(event, 'factorAuthentication')"> Factor Authentication</button>
        <button class="tablinks" onclick="openCity(event, 'browserSessions')">Browser Sessions</button>
        <button class="tablinks" onclick="openCity(event, 'deleteAccount')">Delete Account</button>
    </div>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div id="profilInformation" class="tabcontent">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')

            <x-section-border />
            @endif
        </div>
        <div id="updatePassword" class="tabcontent">
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="mt-10 sm:mt-0">
                @livewire('profile.update-password-form')
            </div>

            <x-section-border />
            @endif
        </div>
        <div id="factorAuthentication" class="tabcontent">
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <div class="mt-10 sm:mt-0">
                @livewire('profile.two-factor-authentication-form')
            </div>

            <x-section-border />
            @endif
        </div>
        <div id="browserSessions" class="tabcontent">
            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <x-section-border />
        </div>
        <div id="deleteAccount" class="tabcontent">
            <div class="mt-10 sm:mt-0">
                @livewire('profile.delete-user-form')
            </div>
            @endif
        </div>
        </div>
    </div>
</x-app-layout>