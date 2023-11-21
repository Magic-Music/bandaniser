@aware(['active'])

<a class="nav-item nav-link {{ $active == $slug ? 'active' : '' }}" href="{{ $link }}">
    {{ $slot }}
</a>
