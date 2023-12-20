<div class="form-group" {!! $containerId ? 'id="' . $containerId . '"' : '' !!}>
    @if ($label)
        <label for="{{ $id }}">{{ $label }}</label>
    @endif
    <input
        type="{{ $type }}"
        id="{{ $id }}"
        name="{{ $id }}"
        @if($value)
            value="{{ $value }}"
        @endif
        @if($placeholder)
            placeholder="{{ $placeholder }}"
        @endif
        class="form-control"
    >
</div>
