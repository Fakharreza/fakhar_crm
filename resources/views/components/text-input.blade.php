@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 bg-white text-gray-800 focus:border-[#c0b49a] focus:ring-[#c0b49a] bg-white text-gray-800 border-gray-300 rounded-md shadow-sm']) !!}>
