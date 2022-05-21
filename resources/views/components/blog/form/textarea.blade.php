@props(['name', 'placeholder', 'value' ])
<textarea  required id="{{ $name}}" cols="30" rows="10" name="{{ $name }}" class="form-control" placeholder="{{ $placeholder }}" require="" >
{{$value}}
</textarea>
@error($name)
<small class="text-danger">{{ $message}}</small>
@enderror
