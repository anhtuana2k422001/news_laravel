@props(['name', 'placeholder', 'value', 'required' ])
<textarea  required id="{{ $name}}" cols="30" rows="10" name="{{ $name }}" class="form-control" placeholder="{{ $placeholder }}" >
{{$value}}
</textarea>
@error($name)
<small class="text-danger">{{ $message}}</small>
@enderror
