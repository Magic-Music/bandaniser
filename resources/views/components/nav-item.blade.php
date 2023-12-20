@aware(['active'])

<a class="nav-item nav-link {{ $active == $slug ? 'active' : '' }}" href="{{ $href }}">
    {{ $slot }}
</a>
