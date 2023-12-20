<form id="update-{{ $id }}-form" onsubmit="event.preventDefault(); {!! $submit !!}; return false;">
    {{ $slot }}
    <button type="submit" class="btn btn-sm btn-primary">{{ $submitText }}</button>
</form>
