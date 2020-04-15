{{--<div class="form-group">
    <input name="title" type="text" class="form-control" required value="{{ $post->title ?? ''}}">
</div>--}}
<div class="form-group">
    <b>Аватар</b> <input type="file" name="img">
</div>
<div class="form-group">
    <b>Имя: </b><input name="name" type="text" class="form-control" required value="{{ $user->name ?? ''}}">
    <b>Email: </b><input name="email" type="email" class="form-control" required value="{{ $user->email ?? ''}}">
    {{--<textarea name="descr" rows="3" class="form-control" required>{{ old('descr') ?? $post->descr ?? ''}}</textarea>--}}
</div>

