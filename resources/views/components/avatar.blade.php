@props(['search', 'provider' => ''])

<img src="https://unavatar.io/{{ $provider ? $provider.'/' : '' }}{{ $search }}?" {{ $attributes }} />
