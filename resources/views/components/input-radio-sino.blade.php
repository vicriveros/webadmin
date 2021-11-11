@php
if(isset($model))
    $value = old($name, $model->$name);
else
    $value = '';
@endphp
<div class="row mb-3">
    <label for="colFormLabel" class="col-sm-2 col-form-label fw-bold">{{ ucfirst($name) }}</label>
    <div class="col-sm-10">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="{{ $name }}" value="Si" {{ $value == 'Si' ? 'checked' : ''}}>
            <label class="form-check-label" for="inlineRadio1">Si</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="{{ $name }}" value="No" {{ $value == 'No' ? 'checked' : ''}}>
            <label class="form-check-label" for="inlineRadio1">No</label>
        </div>
    </div>
</div>