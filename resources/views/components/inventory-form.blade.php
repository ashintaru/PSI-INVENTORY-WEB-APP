@props(['id'])
<form method="put" action="approved-inventory/{id}" class="">
    @csrf
    <x-primary-button>{{ __('Approved') }}</x-primary-button>
</form>