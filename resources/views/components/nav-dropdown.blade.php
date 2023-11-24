<div class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="{{ $id }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $title }}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach($items as $key=>$value)
            <div class="dropdown-item" onclick="{{ $action }}({{ $key }}, '{{ $value }}')">{{ $value }}</div>
        @endforeach
    </div>
</div>
