<aside class="sub_visual mt-100">
    <div class="box">
        <h6>カテゴリー</h6>
        <li>
            <a href="{{ route('products.category_show', ['category_number' => '1' ]) }}">
                <img src="{{ asset('/image/okura.jpeg') }}" alt="potato" width="30px" height="30px">オクラ
            </a>
        </li>
        <li>
            <a href="{{ route('products.category_show', ['category_number' => '2' ]) }}">
                <img src="{{ asset('/image/pumpkin.jpeg') }}" alt="potato" width="30px" height="30px">かぼちゃ
            </a>
        </li>
        <li>
            <a href="{{ route('products.category_show', ['category_number' => '3' ]) }}">
                <img src="{{ asset('/image/chinese_cabbage.jpeg') }}" alt="potato" width="30px"
                    height="30px">キャベツ
            </a>
        </li>
        <li>
            <a href="{{ route('products.category_show', ['category_number' => '4' ]) }}">
                <img src="{{ asset('/image/potato.jpeg') }}" alt="potato" width="30px" height="30px">ジャガイモ
            </a>
        </li>
        <li>
            <a href="{{ route('products.category_show', ['category_number' => '5' ]) }}">
                <img src="{{ asset('/image/radish.jpeg') }}" alt="potato" width="30px" height="30px">大根
            </a>
        </li>
        <li>
            <a href="{{ route('products.category_show', ['category_number' => '6' ]) }}">
                <img src="{{ asset('/image/onion.jpeg') }}" alt="potato" width="30px" height="30px">玉ねぎ
            </a>
        </li>
        <li>
            <a href="{{ route('products.category_show', ['category_number' => '7' ]) }}">
                <img src="{{ asset('/image/tomato.jpeg') }}" alt="potato" width="30px" height="30px">トマト
            </a>
        </li>
        <li>
            <a href="{{ route('products.category_show', ['category_number' => '20' ]) }}">
                <img src="{{ asset('/image/broccoli.jpeg') }}" alt="potato" width="30px" height="30px">その他
            </a>
        </li>
    </div>
    <div class="box box_1">
        <li><a href="{{ route('products.create') }}">投稿する<i class="fas fa-chevron-right arrow"></i></a></li>
        <li><a href="{{ route('users.list') }}">生産者一覧<i class="fas fa-chevron-right arrow"></i></a></li>
    </div>
</aside>
