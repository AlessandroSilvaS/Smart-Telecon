@props(['disabled' => false])

<input 
  {{ $disabled ? 'disabled' : '' }} 
  {!! $attributes->merge([
    'class' => 'rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500',
    'style' => 'border: 1px solid #0ed4ee;'
  ]) !!}>
