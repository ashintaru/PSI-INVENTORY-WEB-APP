@props(['route','id'])

<a href="{{route($route,$id)}}" {{ $attributes->merge(['type' => 'button', 'class' => ' text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-md text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Green disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
