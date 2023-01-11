@extends('main')
@section('main')
    <div style="padding-left:10em;padding-right:10em;">
        
            <div class="mt-3 rounded shadow-sm w-100 p-4 pt-0 pb-2" style="margin-left:2%;background-color:white">
                <div class="d-flex justify-content-center">
                    <a href="#" class="text-decoration-none fw-semibold text-dark m-3  mb-0">Bài
                        đăng</a>
                    
                </div>
                <hr>
                @foreach ($dsBaiDang as $item)
                    <a href="{{ route('xem-bai-dang', ['id' => $item->id]) }}" class="text-decoration-none text-dark">
                        <div class="rounded-2  d-flex p-4 pt-0 pb-3 mt-2 justify-content-between shadow-sm">
                            <div class="d-flex flex-fill align-items-center">
                                <?php
                                if ($item->nguoiDung->anh_dai_dien != '') {
                                    echo '<img src="clients/img/' . $item->nguoiDung->anh_dai_dien . '" alt="" class="rounded-2" style="width:5em;height:5em">';
                               
                                }
                                ?>
                                <div style="margin-left:3%;background-color:white">
                                    <div class="fs-5 fw-semibold">{{ $item->tieu_de }}</div>
                                    <div>{{ $item->nguoiDung->ho_ten }}</div>
                                    <div class="d-flex text-center mt-2">
                                        @if ($item->trang_thai == 0)
                                            <div class="rounded p-2 pt-0 pb-0 bg-success text-white">
                                                {{ $item->the_loai_id == 1 ? 'Đã trả' : 'Đã tìm thấy' }}</div>
                                            &ensp;
                                        @else
                                            <div class="rounded p-2 pt-0 pb-0 shadow-sm"
                                                style="background-color:#D6FFFF;color:#052147">
                                                {{ $item->theLoai->ten }}
                                            </div>
                                            &ensp;
                                        @endif
                                        <div class="rounded p-2 pt-0 pb-0 shadow-sm"
                                            style="background-color:#D6FFFF;color:#052147">
                                            {{ $item->danhMuc->ten }} </div>
                                        &ensp;
                                        <div class="rounded p-2 pt-0 pb-0 shadow-sm"
                                            style="background-color:#D6FFFF;color:#052147">
                                            {{ $item->khuVuc->ten }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row" style="padding-top:.3%;">
                                <div>
                                    {{ \Carbon\Carbon::now()->format('d/m/Y') == $item->updated_at->format('d/m/Y') ? $item->updated_at->format('H:i') : $item->updated_at->format('d/m/Y') }}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Hien thi chon bao cao --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Báo Cáo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <h5>Báo cáo bài viết với quản trị viên</h5>
                    Hãy cho quản trị viên biếut bài viết này có vấn đề gì. Chúng tôi sẽ không thông
                    báo cho người đăng rằng
                    bạn đã báo cáo.
                </div>
                <div class="list-group">
                    @foreach ($array as $key => $item)
                        <a class="list-group-item list-group-item-action" data-bs-toggle="modal"
                            data-bs-target="#staticBackdropReport{{ $key }}">{{ $item }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @foreach ($array as $key => $item)
        <div class="modal fade" id="staticBackdropReport{{ $key }}" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('bao-cao') }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <input type="text" name="nguoi_dung" value="{{ $user->id }}" hidden>
                            <input type="text" name="bai_dang" value="" hidden>
                            <input type="text" name="binh_luan" value="" hidden>
                            <input type="text" name="bao_cao" value="{{ $item }}" hidden>
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $item }}
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            Chúng tôi sẽ xem xét báo cáo và thông báo cho bạn về quyết định của mình.
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">Hủy</button>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
