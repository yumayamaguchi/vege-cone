@extends('app')

@section('title', '詳細画面')

@section('content')
    @include('nav')
    <div class="mw-1000 center">
        <div class="text-center mt-100">
            <div class="show h-100">
                <a href="{{ route('products.show', ['product' => $product]) }}">
                    @if (!empty($product->image))
                        <img src="{{ asset('storage/image/' . $product->image) }}" class="" alt="" width="800px"
                            height="500px" />
                    @else
                        <img src="{{ asset('image/no-image.jpg') }}" class="" alt="" width="200px" height="250px" />
                    @endif
                </a>

                @if (Auth::id() === $product->user_id)
                    {{-- modal --}}
                    <div id="modal-delete-{{ $product->id }}" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('products.destroy', ['product' => $product]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body">
                                        {{ $product->name }}を削除します。よろしいですか？
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                                        <button type="submit" class="btn btn-danger">削除する</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- modalここまで --}}
                @endif
                <table>
                    <tbody>
                        <tr>
                            <th>生産者名</th>
                            <td>：{{ $product->user->producer_name }}</td>
                        </tr>
                        <tr>
                            <th>商品名</th>
                            <td>：{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>商品詳細</th>
                            <td>：{{ $product->introduction }}</td>
                        </tr>
                        <tr>
                            <th>販売量</th>
                            <td>：{{ $product->amount }}キロ</td>
                        </tr>
                        <tr>
                            <th>販売価格</th>
                            <td>：{{ $product->price }}円</td>
                        </tr>
                        <tr>
                            <th>産地</th>
                            <td>：{{ $product->origin }}</td>
                        </tr>
                    </tbody>
                </table>
                {{-- <form class="" action="">
                    <select class="browser-default custom-select same-width">
                        <option selected>数量を選択</option>
                        <option value="1">1箱</option>
                        <option value="2">2箱</option>
                        <option value="3">3箱</option>
                        <option value="4">4箱</option>
                        <option value="5">5箱</option>
                        <option value="6">6箱</option>
                        <option value="7">7箱</option>
                        <option value="8">8箱</option>
                        <option value="9">9箱</option>
                        <option value="10">10箱</option>
                    </select>
                    <div class="mt-50"></div>
                    <button class="btn btn-block btn-outline-primary same-width" data-mdb-ripple-color="dark" type="submit">
                        <i class="fas fa-shopping-cart"></i>カートに入れる</button>
                </form> --}}
            </div>
        </div>
    </div>

    </div>
    @include('footer')
@endsection
