<div class="form-row">
  <div class="col-md-3">
    <label for="{{ $name }}">{{ $title }}</label>
  </div>
  <div class="col-md-6">
    <input class="form-control" id="{{ $name }}" type="{{ $type }}" class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}" name="{{ $name }}" value="{{ old($name, isset($value) ? $value : '') }}" {{ $required ? 'required' : ''}}>
  </div>
  @if ($errors->has($name))
    <div class="invalid-feedback">
      {{ $errors->first($name) }}
    </div>
  @endif
</div>
