<div class="col-sm-4 mt-100">
    <div class="card h-100">
        <a href="{{ route('products.show', ['product' => $product]) }}">
            @if (!empty($product->image))
                <img src="{{ asset('storage/image/' . $product->image) }}" class="card-img-top" alt="" width="200px"
                    height="250px" />
            @else
                <img src="{{ asset('image/no-image.jpg') }}" class="card-img-top" alt="" width="200px"
                    height="250px" />
            @endif
            <div class="card-body">

                @if (Auth::id() === $product->user_id)
                    {{-- ドロップダウン --}}
                    <div class="ml-auto card-text exit">
                        <div class="dropdown">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <button type="button" class="btn btn-link text-muted m-0 p-2">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('products.edit', ['product' => $product]) }}">
                                    <i class="fas fa-pen mr-1"></i>記事を更新する
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" data-toggle="modal"
                                    data-target="#modal-delete-{{ $product->id }}">
                                    <i class="fas fa-trash-alt mr-1"></i>記事を削除する
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- ドロップダウンここまで --}}

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
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">
                    {{ $product->introduction }}
                </p>
            </div>
        </a>
    </div>
</div>
