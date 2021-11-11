@php
if(isset($model))
    $value = old($name, $model->$name);
else
    $value = '';
@endphp
<div class="row mb-3">
    <label for="colFormLabel" class="col-sm-2 col-form-label fw-bold">{{ ucfirst($name) }}</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="{{ $name }}" value="{{ $value ?? '' }}" {{ $required ?? '' }}>
    </div>
</div>