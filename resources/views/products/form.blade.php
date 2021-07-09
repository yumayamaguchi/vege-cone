@csrf
<div class="md-form">
    <label>商品名</label>
    <input type="text" name="name" class="form-control" required value="{{ $product->name ?? old('name') }}">
</div>

<div class="md-form">
    @include('products.category')
</div>

<div class="form-group">
    <label></label>
    <textarea name="introduction" required class="form-control" rows="16"
        placeholder="紹介文">{{ $product->introduction ?? old('introduction') }}</textarea>
</div>

<div class="md-form">
    <label>販売量(キロ)</label>
    <input type="number" name="amount" class="form-control" required value="{{ $product->amount ?? old('amount') }}">
</div>

<div class="md-form">
    <label>販売価格(円)</label>
    <input type="number" name="price" class="form-control" required value="{{ $product->price ?? old('price') }}">
</div>
<div class="md-form">
    <label>産地</label>
    <input type="text" name="origin" class="form-control" value="{{ $product->origin ?? old('origin') }}">
</div>
<div class="introduction_image">
    <label class="form-label" for="image">画像</label>
    <input class="form-control-file" type="file" id="image" name="image">
</div>
