<div class="md-form">
  <label for="producer_name">生産者名</label>
  <input class="form-control" type="text" id="producer_name" name="producer_name" required
      value="{{ old('producer_name') ?? $user->producer_name }}">
</div>
<div class="md-form">
  <label for="name">担当者名</label>
  <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') ??$user->name }}">
</div>
<div class="md-form">
  <label for="introduction"></label>
  <textarea name="introduction" id="introduction" required class="form-control" rows="16"
      placeholder="紹介文">{{ old('introduction') ??$user->introduction }}</textarea>
</div>

<div class="md-form">
  <label for="address">住所</label>
  <input class="form-control" type="text" id="address" name="address" required
      value="{{ old('address') ?? $user->address }}">
</div>

<div class="md-form">
  <label for="email">メール</label>
  <input class="form-control" type="text" id="email" name="email" required
      value="{{ old('email') ?? $user->email }}">
</div>
<div class="md-form">
  <label for="password">パスワード</label>
  <input class="form-control" type="password" id="password" name="password" required>
</div>

<div class="introduction_image">
  <label class="form-label" for="image">紹介画像</label>
  <input class="form-control-file" type="file" id="image" name="image">
</div>
