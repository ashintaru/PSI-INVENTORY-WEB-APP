@if (!is_null($carid))
    <form method="POST" action="{{URL('approved-inventory/'.$carid)}}" class="">
        @csrf
        @method('PUT')
        <x-primary-button>{{ __('Approved') }}</x-primary-button>
    </form>
@endif
