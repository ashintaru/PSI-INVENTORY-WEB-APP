<x-app-layout>
    @if (!is_null($car))
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                @include('carprofile.profile.profile')
            </div>
        </div>
    @endif
</x-app-layout>
