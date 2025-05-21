<button 
  {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#0ed4ee] focus:bg-[#0ed4ee] active:bg-[#0bb9d5] focus:outline-none focus:ring-2 focus:ring-[#0ed4ee] focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150'
  ]) }}>
    {{ $slot }}
</button>

