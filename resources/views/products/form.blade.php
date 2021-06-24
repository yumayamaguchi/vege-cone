@csrf
<div class="md-form">
    <label>商品名</label>
    <input type="text" name="name" class="form-control" required value="{{ $product->name ?? old('name') }}">
</div>
<div class="form-group">
    <label></label>
    <textarea name="introduction" required class="form-control" rows="16"
        placeholder="紹介文">{{ $product->introduction ?? old('introduction') }}</textarea>
</div>
<div class="introduction_image">
    <label class="form-label" for="image">画像</label>
    <input class="form-control-file" type="file" id="image" name="image">
</div>
