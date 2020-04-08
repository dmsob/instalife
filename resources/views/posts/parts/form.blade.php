<!--<div class="form-group">
    <input name="title" type="text" class="form-control" required value="{{ $post->title ?? ''}}">
</div> -->
<div class="form-group">
    <input type="file" name="img">
</div>
<div class="form-group">
    <textarea name="descr" rows="3" class="form-control" required>{{ old('descr') ?? $post->descr ?? ''}}</textarea>
</div>

