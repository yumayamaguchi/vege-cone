<div class="md-form">
  <label for="restaurant_name">飲食店名</label>
  <input class="form-control" type="text" id="restaurant_name" name="restaurant_name" required
      value="{{ old('restaurant_name') ?? $restaurant->restaurant_name }}">
</div>
<div class="md-form">
  <label for="name">担当者名</label>
  <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') ??$restaurant->name }}">
</div>
<div class="md-form">
  <label for="introduction"></label>
  <textarea name="introduction" id="introduction" required class="form-control" rows="16"
      placeholder="紹介文">{{ old('introduction') ?? $restaurant->introduction }}</textarea>
</div>

<div class="md-form">
  <label for="address">住所</label>
  <input class="form-control" type="text" id="address" name="address" required
      value="{{ old('address') ?? $restaurant->address }}">
</div>

<div class="md-form">
  <label for="email">メール</label>
  <input class="form-control" type="text" id="email" name="email" required
      value="{{ old('email') ?? $restaurant->email }}">
</div>
<div class="md-form">
  <label for="password">パスワード</label>
  <input class="form-control" type="password" id="password" name="password" required>
</div>

<div class="introduction_image">
  <label class="form-label" for="image">紹介画像</label>
  <input class="form-control-file" type="file" id="image" name="image">
</div>
