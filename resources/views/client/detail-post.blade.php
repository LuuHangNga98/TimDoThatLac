@extends('index')
@section('body')

<div style="padding-left:20em;padding-right:20em;">
        <div class=" p-4 mt-3 mb-3 pt-3 pb-3 rounded-2 shadow-sm border" style="background-color:white">
            <div class="d-flex align-items-center justify-content-between">
                @if ($baiDang->nguoiDung->admin == 0)
                    <a href="{{ route('ds-bai-dang', ['id' => $baiDang->nguoi_dung_id]) }}">
                        <!-- nếu admin thì k vào coi trang đc, không được báo cáo -->
                        <?php
                        if ($baiDang->nguoiDung->anh_dai_dien != '') {
                            echo '<img src="clients/img/' . $baiDang->nguoiDung->anh_dai_dien . '" alt="" width="50px" height="50px" class="rounded-circle mr-3">';
                        } elseif ($baiDang->nguoiDung->gioi_tinh == 1) {
                            echo '<img src="clients/img/Logo.png" alt="" width="50px" height="50px" class="rounded-circle mr-3">';
                        } else {
                            echo '<img src="clients/img/Logo.png" alt="" width="50px" height="50px" class="rounded-circle mr-3">';
                        }
                        ?>
                    </a>
                    <div class="d-flex align-content-center flex-column" style="padding-left:2%">
                        <div>
                            <a href="{{ route('ds-bai-dang', ['id' => $baiDang->nguoi_dung_id]) }}"
                                class="text-decoration-none fw-semibold"
                                style="color:black">{{ $baiDang->nguoiDung->ho_ten }}</a>
                        </div>
                        <div style="color:rgb(154, 155, 157)">{{ $baiDang->created_at->format('d/m/Y') }}</div>
                    </div>
                @else
                    <a href="#">
                        <img src="/images/default_images/admin.png" alt="" width="50px" height="50px"
                            class="rounded-circle mr-3">
                    </a>
                    <div class="d-flex align-content-center flex-column" style="padding-left:2%">
                        <div>
                            <a href="#" class="text-decoration-none fw-semibold" style="color:black">TimDoThatLac</a>
                        </div>
                        <div style="color:rgb(154, 155, 157)">{{ $baiDang->created_at->format('d/m/Y') }}</div>
                    </div>
                @endif
                <div class="col" style="text-align: right;">
                    <div class="dropdown hienthi">
                        <button class="btn btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ URL('images/default_images/menu-dots.png') }}" class="rounded-circle"
                                style="width: 1.3em;height:1.3em">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            @if (Auth::id() == $baiDang->nguoiDung->id)
                                @if ($baiDang->trang_thai == 1 && Auth::user()->admin == 0)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('da-tim-thay', ['id' => $baiDang->id]) }}">{{ $baiDang->the_loai_id == 1 ? 'Đã trả' : 'Đã tìm thấy' }}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('chinh-sua-bai-dang', ['id' => $baiDang->id]) }}">Chỉnh sửa</a>
                                    </li>
                                @endif
                                @if (Auth::user()->admin == 0)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('xoa-bai-dang', ['id' => $baiDang->id]) }}">Xoá</a>
                                    </li>
                                @else
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('xoa-bai-dang-admin', ['id' => $baiDang->id]) }}">Xoá</a>
                                    </li>
                                @endif
                            @else
                                <li>
                                    @if (Auth::id() == null)
                                        <a class="dropdown-item" href="{{ route('dang-nhap') }}">Theo
                                            dõi</a>
                                    @else
                                        @if ($daTheoDoi != null)
                                            @if ($daTheoDoi->trang_thai == 1)
                                                <a class="dropdown-item"
                                                    href="{{ route('xl-bo-theo-doi', ['bai_dang_id' => $baiDang->id]) }}">Bỏ
                                                    theo dõi</a>
                                            @else
                                                <a class="dropdown-item"
                                                    href="{{ route('xl-theo-doi-lai', ['bai_dang_id' => $baiDang->id]) }}">Theo
                                                    dõi</a>
                                            @endif
                                        @else
                                            <a class="dropdown-item"
                                                href="{{ route('xl-theo-doi', ['bai_dang_id' => $baiDang->id]) }}">Theo
                                                dõi</a>
                                        @endif
                                    @endif
                                </li>
                                <li>
                                    @if (Auth::id() == null)
                                        <a class="dropdown-item" href="/dang-nhap">Báo cáo</a>
                                    @else
                                        @if ($baiDang->nguoiDung->admin == 0)
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                href="">Báo cáo</a>
                                        @endif
                                    @endif
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="hienthi">
            <div class=" d-flex flex-column justify-content-between">
                <div class=" d-flex flex-column justify-content-between">
                    <div class="fs-4 fw-semibold text-justify">{{ $baiDang->tieu_de }}</div>
                    <div class="mt-2 d-flex align-items-center">
                        @if ($baiDang->nguoiDung->admin == 0)
                            <img src="/images/default_images/caret-right.png" width="2%" class="align-self-start">
                        @endif
                        <div>{{ $baiDang->noi_dung }}</div>
                    </div>
                    @if ($baiDang->nguoiDung->admin == 0)
                        <div class="mt-2 d-flex align-items-center">
                            <img src="/images/default_images/caret-right.png" width="2%" class="align-self-start">
                            <div class="fw-semibold">Địa chỉ:</div>
                            <div>&ensp;{{ $baiDang->dia_chi }}</div>
                        </div>
                        <div class="mt-2 d-flex align-items-center">
                            <img src="/images/default_images/caret-right.png" width="2%" class="align-self-start">
                            <div class="fw-semibold">Hình thức liên hệ </div>
                        </div>
                    @endif
                    <div class="d-flex justify-content-left mt-2">
                        @if ($lienHe != null)
                            @if ($lienHe->dien_thoai != null)
                                <div class="d-flex align-items-center">
                                    &ensp;&ensp;&ensp;<img src="/images/default_images/circle-small.png" width="13em">
                                    <div class="fw-semibold">&ensp;Điện thoại: </div>
                                    <div>&ensp;{{ $lienHe->dien_thoai }}</div>
                                </div>
                            @endif
                            @if ($lienHe->zalo != null)
                                <div class="d-flex align-items-center">
                                    &ensp;&ensp;&ensp;<img src="/images/default_images/circle-small.png" width="13em">
                                    <div class="fw-semibold">&ensp;Zalo: </div>
                                    <div>&ensp;{{ $lienHe->zalo }}</div>
                                </div>
                            @endif
                            @if ($lienHe->facebook != null)
                                <div class="d-flex align-items-center">
                                    &ensp;&ensp;&ensp;<img src="/images/default_images/circle-small.png" width="13em">
                                    <div class="fw-semibold">&ensp;Facebook:</div>
                                    <div>&ensp;{{ $lienHe->facebook }}</div>
                                </div>
                            @endif
                        @endif

                    </div>
                    <div class="d-flex text-center mt-3 mb-3">
                        @if ($baiDang->trang_thai == 0)
                            <div class="rounded p-2 pt-0 pb-0 bg-success text-white">
                                {{ $baiDang->the_loai_id == 1 ? 'Đã trả' : 'Đã tìm thấy' }}
                            </div>
                            &ensp;
                        @else
                            <div class="rounded p-2 pt-0 pb-0 shadow-sm" style="background-color:#D6FFFF;color:#052147">
                                {{ $baiDang->theLoai->ten }}
                            </div>
                            &ensp;
                        @endif
                        @if ($baiDang->nguoiDung->admin == 0)
                            &ensp;
                            <div class="rounded p-2 pt-0 pb-0 shadow-sm" style="background-color:#D6FFFF;color:#052147">
                                <div> {{ $baiDang->danhMuc->ten }} </div>
                            </div>
                        @endif
                        @if ($baiDang->nguoiDung->admin == 0)
                            &ensp;
                            <div class="rounded p-2 pt-0 pb-0 shadow-sm" style="background-color:#D6FFFF;color:#052147">
                                <div> {{ $baiDang->khuVuc->ten }} </div>
                            </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between align-items-between flex-wrap mt-2 mb-2">
                        @if ($soLuongHA == 2 || $soLuongHA == 4)
                            @foreach ($hinhAnh as $key => $item)
                                <div style="width:49.5%;height:30%" class="mb-2  rounded-2">
                                    <img src="{{ URL("images/added_images/$item->hinh_anh") }}"
                                        class="border rounded-2 zoomin" style="object-fit:cover" width="100%"
                                        height="320px">
                                </div>
                            @endforeach
                        @else
                            @if ($soLuongHA == 1)
                                @foreach ($hinhAnh as $key => $item)
                                    <div style="width:100%;height:60%" class="mb-2  rounded-2">
                                        <img src="{{ URL("images/added_images/$item->hinh_anh") }}"
                                            class="border rounded-2 zoomin" style="object-fit:cover" width="100%"
                                            height="650px">
                                    </div>
                                @endforeach
                            @else
                                @if ($soLuongHA == 3)
                                    @foreach ($hinhAnh as $key => $item)
                                        @if ($key == 0)
                                            <div style="width:60%;height:60%" class="mb-2  rounded-2">
                                                <img src="{{ URL("images/added_images/$item->hinh_anh") }}"
                                                    class="border rounded-2 zoomin" style="object-fit:cover"
                                                    width="100%" height="647px">
                                            </div>
                                        @endif
                                    @endforeach
                                    <div style="width:39%;height:60%" class="d-flex flex-column">
                                        @foreach ($hinhAnh as $key => $item)
                                            @if ($key != 0)
                                                <div class="mb-2  rounded-2">
                                                    <img src="{{ URL("images/added_images/$item->hinh_anh") }}"
                                                        class="border rounded-2 zoomin" style="object-fit:cover"
                                                        width="100%" height="320px">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @else
                                    @if ($soLuongHA == 5)
                                        <div class="d-flex flex-row justify-content-between">
                                            @foreach ($hinhAnh as $key => $item)
                                                @if ($key == 0 || $key == 1)
                                                    <div style="width:49.5%" class="mb-2  rounded-2">
                                                        <img src="{{ URL("images/added_images/$item->hinh_anh") }}"
                                                            class="border rounded-2 zoomin" style="object-fit:cover"
                                                            width="100%" height="400px">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div style="width:100%" class="d-flex flex-row justify-content-between">
                                            @foreach ($hinhAnh as $key => $item)
                                                @if ($key != 0 && $key != 1)
                                                    <div style="width:32.7%" class="mb-2  rounded-2">
                                                        <img src="{{ URL("images/added_images/$item->hinh_anh") }}"
                                                            class="border rounded-2 zoomin" style="object-fit:cover"
                                                            width="100%" height="250px">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                            @endif
                        @endif
                    </div>
                    @if (Auth::id() != null)
                        <div class="input-group hienthi d-flex">
                            <?php
                            if ($user->anh_dai_dien != '') {
                                echo '<img src="/images/added_images/' . $user->anh_dai_dien . '" alt="" class="rounded-circle" width="42em" height="42em" style="object-fit: cover;margin-right:10px">';
                            } elseif ($user->gioi_tinh == 1) {
                                echo '<img src="/images/default_images/man.png" alt="" width="42em" class="rounded-circle" height="42em" style="object-fit: cover;margin-right:10px">';
                            } else {
                                echo '<img src="/images/default_images/woman.png" alt="" width="42em" class="rounded-circle" height="42em" style="object-fit: cover;margin-right:10px">';
                            }
                            ?>
                            <form action="{{ route('xl-binh-luan', ['idBaiDang' => $baiDang->id]) }}"
                                class="flex-fill d-flex align-items-center" method="post">
                                @csrf
                                <input class="flex-fill form-control rounded-5" type="text" name="binh_luan"
                                    placeholder="Bình luận ..." style="background-color:#D6FFFF"
                                    autocomplete="off">&ensp;
                                <div class="rounded-3" style="padding-left:5px">
                                    <button class="btn btn-light pt-1 pb-1 border" type="submit" id="button-addon2">
                                        <img src="{{ URL('images/default_images/paper-plane.png') }}"
                                            style="width:1.45em;padding-bottom:.1em">
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                    @if (count($dsBinhLuan) > 0)
                        <hr>
                        @foreach ($dsBinhLuan as $key => $item)
                            <div class="d-flex mb-3">
                                <div>
                                    <a class="fw-semibold text-decoration-none text-dark"
                                        href="{{ route('ds-bai-dang', ['id' => $item->nguoi_dung_id]) }}">
                                        <?php
                                        if ($item->nguoiDung->anh_dai_dien != '') {
                                            echo '<img src="/images/added_images/' . $item->nguoiDung->anh_dai_dien . '" alt="" width="42em" height="42em" style="object-fit: cover;margin-right:10px" class=" rounded-5 border">';
                                        } elseif ($item->nguoiDung->gioi_tinh == 1) {
                                            echo '<img src="/images/default_images/man.png" alt="" width="42em" height="42em" style="object-fit: cover;margin-right:10px" class="rounded-5 border">';
                                        } else {
                                            echo '<img src="/images/default_images/woman.png" alt="" width="42em" height="42em" style="object-fit: cover;margin-right:10px" class="rounded-5 border">';
                                        }
                                        ?>
                                    </a>
                                </div>
                                <div class="d-flex flex-column flex-fill">
                                    <div>
                                        <div class="d-flex">
                                            <div class="rounded-4 p-3 pt-1 pb-1 shadow-sm"
                                                style="min-width: 10%;background-color:rgb(237, 243, 255)">
                                                <a class="fw-semibold text-decoration-none text-dark"
                                                    href="{{ route('ds-bai-dang', ['id' => $item->nguoi_dung_id]) }}">{{ $item->nguoiDung->ho_ten }}</a>
                                                <div class="" style="width:fit-content">
                                                    {{ $item->noi_dung }}
                                                </div>
                                            </div>
                                            @if (Auth::id() != null)
                                                <div class="dropend hienthi align-self-center">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <img src="{{ URL('images/default_images/menu-dots.png') }}"
                                                            class="rounded-circle" style="width: 1em;height:1em">
                                                    </button>
                                                    @if ($item->nguoi_dung_id == Auth::id())
                                                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                                            <li>
                                                                <a data-bs-toggle="modal" class="dropdown-item"
                                                                    data-bs-target="#editComment{{ $key }}">
                                                                    Chỉnh sửa
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a data-bs-toggle="modal" class="dropdown-item"
                                                                    data-bs-target="#deleteComment{{ $key }}">
                                                                    Xoá
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <!-- Delete comment -->
                                                        <div class="modal fade" id="deleteComment{{ $key }}"
                                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                                            tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="staticBackdropLabel">
                                                                            Xoá bình luận
                                                                        </h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Bạn có chắc chắn muốn xoá bình luận này
                                                                        không?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light"
                                                                            data-bs-dismiss="modal">Không</button>
                                                                        <form
                                                                            action="{{ route('xl-xoa-binh-luan', ['idBinhLuan' => $item->id, 'idBaiDang' => $item->bai_dang_id]) }}">
                                                                            <button type="submit"
                                                                                class="btn btn-primary fs-5">Xoá</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Edit comment -->
                                                        <div class="modal fade" id="editComment{{ $key }}"
                                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                                            tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="staticBackdropLabel">
                                                                            Chỉnh sửa
                                                                            bình luận
                                                                        </h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ route('xl-chinh-sua-binh-luan', ['idBinhLuan' => $item->id, 'idBaiDang' => $item->bai_dang_id]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <input type="text"
                                                                                name="chinh_sua_binh_luan"
                                                                                class="form-control"
                                                                                value="{{ $item->noi_dung }}">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-light"
                                                                                data-bs-dismiss="modal">Hủy</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary fs-5">Chỉnh
                                                                                sửa</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                                            <li>
                                                                <a data-bs-toggle="modal" class="dropdown-item"
                                                                    data-bs-target="#reportMainComment{{ $key }}">
                                                                    Báo cáo
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="modal fade" id="reportMainComment{{ $key }}"
                                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                                            tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="staticBackdropLabel">
                                                                            Báo Cáo</h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body ">
                                                                        <h5>Báo cáo bình luận với quản trị viên</h5>
                                                                        Hãy cho quản trị viên biết bình luận này có vấn đề
                                                                        gì.
                                                                        Chúng tôi sẽ không thông
                                                                        báo cho người đăng rằng
                                                                        bạn đã báo cáo.
                                                                    </div>
                                                                    <div class="list-group">
                                                                        @foreach ($array as $reportKey => $reportItem)
                                                                            @if ($reportItem != 'Hình ảnh chứa nội dung nhạy cảm')
                                                                                <a class="list-group-item list-group-item-action"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#reportComment{{ $reportKey }}{{ $key }}">{{ $reportItem }}</a>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @foreach ($array as $reportKey => $reportItem)
                                                            <div class="modal fade"
                                                                id="reportComment{{ $reportKey }}{{ $key }}"
                                                                data-bs-backdrop="static" data-bs-keyboard="false"
                                                                tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <form action="{{ route('bao-cao') }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <div class="modal-header">
                                                                                <input type="text" name="nguoi_dung"
                                                                                    value="" hidden>
                                                                                <input type="text" name="bai_dang"
                                                                                    value="{{ $item->bai_dang_id }}"
                                                                                    hidden>
                                                                                <input type="text" name="binh_luan"
                                                                                    value="{{ $item->id }}" hidden>
                                                                                <input type="text" name="bao_cao"
                                                                                    value="{{ $reportItem }}" hidden>
                                                                                <h1 class="modal-title fs-5"
                                                                                    id="staticBackdropLabel">
                                                                                    {{ $reportItem }}
                                                                                </h1>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body ">
                                                                                Chúng tôi sẽ xem xét báo cáo và thông báo
                                                                                cho
                                                                                bạn về quyết định của mình.
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#staticBackdrop">Hủy</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Gửi</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                        <div class="d-flex mt-1">
                                            @if (Auth::id() != null)
                                                <button style="padding-left: 20px;font-size:.8em"
                                                    class="fw-semibold btn pb-0 pt-0 response"onclick="myFunction({{ $key }})">Phản
                                                    hồi</button>
                                            @endif
                                            <div class="fw-semibold"
                                                style="font-size:.8em;color:rgb(154, 155, 157);padding-left: 10px">
                                                @if (\Carbon\Carbon::now()->format('d/m/Y') == $item->updated_at->format('d/m/Y'))
                                                    {{ $item->updated_at->format('H:i') }}
                                                @else
                                                    {{ $item->updated_at->format('d/m/Y') }}
                                                @endif
                                            </div>
                                        </div>
                                        <script>
                                            function myFunction(id) {
                                                var x = document.getElementById(id);
                                                if (document.getElementById(id).style.visibility == "hidden") {
                                                    document.getElementById(id).style.visibility = "visible";
                                                    document.getElementById(id).style.maxHeight = "initial";
                                                    document.getElementById(id).style.marginTop = "10px";
                                                }
                                                var array = <?php echo json_encode($dsBinhLuan); ?>;
                                                for (let index = 0; index < array.length; index++) {
                                                    if (id != index) {
                                                        if (document.getElementById(index).style.visibility != "hidden") {
                                                            document.getElementById(index).style.visibility = "hidden";
                                                            document.getElementById(index).style.maxHeight = "0";
                                                            document.getElementById(index).style.marginTop = "0px";
                                                        }
                                                    }
                                                }
                                            }
                                        </script>
                                    </div>
                                    @foreach ($dsPhanHoi as $keyPhanHoi => $phanHoi)
                                        @if ($phanHoi->binh_luan_id == $item->id)
                                            <div class="d-flex mt-2">
                                                <div>
                                                    <a class="fw-semibold text-decoration-none text-dark"
                                                        href="{{ route('ds-bai-dang', ['id' => $phanHoi->nguoi_dung_id]) }}">
                                                        <?php
                                                        if ($phanHoi->nguoiDung->anh_dai_dien != '') {
                                                            echo '<img src="/images/added_images/' . $phanHoi->nguoiDung->anh_dai_dien . '" alt="" width="42em" height="42em" style="object-fit: cover;margin-right:10px" class=" rounded-5 border">';
                                                        } elseif ($phanHoi->nguoiDung->gioi_tinh == 1) {
                                                            echo '<img src="/images/default_images/man.png" alt="" width="42em" height="42em" style="object-fit: cover;margin-right:10px" class="rounded-5 border">';
                                                        } else {
                                                            echo '<img src="/images/default_images/woman.png" alt="" width="42em" height="42em" style="object-fit: cover;margin-right:10px" class="rounded-5 border">';
                                                        }
                                                        ?>
                                                    </a>
                                                </div>
                                                <div>
                                                    <div class="d-flex">
                                                        <div class="rounded-4 p-3 pt-1 pb-1 shadow-sm"
                                                            style="min-width: 10%;background-color:rgb(237, 243, 255)">
                                                            <a class="fw-semibold text-decoration-none text-dark"
                                                                href="{{ route('ds-bai-dang', ['id' => $phanHoi->nguoi_dung_id]) }}">{{ $phanHoi->nguoiDung->ho_ten }}</a>
                                                            <div class="" style="width:fit-content">
                                                                {{ $phanHoi->noi_dung }}
                                                            </div>
                                                        </div>
                                                        @if (Auth::id() != null)
                                                            <div class="dropend hienthi align-self-center">
                                                                <button class="btn btn-link" type="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <img src="{{ URL('images/default_images/menu-dots.png') }}"
                                                                        class="rounded-circle"
                                                                        style="width: 1em;height:1em">
                                                                </button>
                                                                @if ($phanHoi->nguoi_dung_id == Auth::id())
                                                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                                                        <li>
                                                                            <a data-bs-toggle="modal"
                                                                                class="dropdown-item"
                                                                                data-bs-target="#editResponseComment{{ $keyPhanHoi }}">
                                                                                Chỉnh sửa
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a data-bs-toggle="modal"
                                                                                class="dropdown-item"
                                                                                data-bs-target="#deleteResponseComment{{ $keyPhanHoi }}">
                                                                                Xoá
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                    <!-- Delete Response Comment -->
                                                                    <div class="modal fade"
                                                                        id="deleteResponseComment{{ $keyPhanHoi }}"
                                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                                        tabindex="-1"
                                                                        aria-labelledby="staticBackdropLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h1 class="modal-title fs-5"
                                                                                        id="staticBackdropLabel">Xoá bình
                                                                                        luận
                                                                                    </h1>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    Bạn có chắc chắn muốn xoá bình luận này
                                                                                    không?
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-light"
                                                                                        data-bs-dismiss="modal">Không</button>
                                                                                    <form
                                                                                        action="{{ route('xl-xoa-binh-luan', ['idBinhLuan' => $phanHoi->id, 'idBaiDang' => $phanHoi->bai_dang_id]) }}">
                                                                                        <button type="submit"
                                                                                            class="btn btn-primary fs-5">Xoá</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Edit response comment -->
                                                                    <div class="modal fade"
                                                                        id="editResponseComment{{ $keyPhanHoi }}"
                                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                                        tabindex="-1"
                                                                        aria-labelledby="staticBackdropLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h1 class="modal-title fs-5"
                                                                                        id="staticBackdropLabel">Chỉnh sửa
                                                                                        bình luận
                                                                                    </h1>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <form
                                                                                    action="{{ route('xl-chinh-sua-binh-luan', ['idBinhLuan' => $phanHoi->id, 'idBaiDang' => $phanHoi->bai_dang_id]) }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    <div class="modal-body">
                                                                                        <input type="text"
                                                                                            name="chinh_sua_binh_luan"
                                                                                            class="form-control"
                                                                                            value="{{ $phanHoi->noi_dung }}">
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn btn-light"
                                                                                            data-bs-dismiss="modal">Hủy</button>
                                                                                        <button type="submit"
                                                                                            class="btn btn-primary fs-5">Chỉnh
                                                                                            sửa</button>
                                                                                    </div>
                                                                                </form>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                                                        <li>
                                                                            <a data-bs-toggle="modal"
                                                                                class="dropdown-item"
                                                                                data-bs-target="#reportResponseComment{{ $keyPhanHoi }}">
                                                                                Báo cáo
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="modal fade"
                                                                        id="reportResponseComment{{ $keyPhanHoi }}"
                                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                                        tabindex="-1"
                                                                        aria-labelledby="staticBackdropLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h1 class="modal-title fs-5"
                                                                                        id="staticBackdropLabel">
                                                                                        Báo Cáo</h1>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body ">
                                                                                    <h5>Báo cáo bình luận với quản trị viên
                                                                                    </h5>
                                                                                    Hãy cho quản trị viên biết bình luận này
                                                                                    có
                                                                                    vấn đề gì.
                                                                                    Chúng tôi sẽ không thông
                                                                                    báo cho người đăng rằng
                                                                                    bạn đã báo cáo.
                                                                                </div>
                                                                                <div class="list-group">
                                                                                    @foreach ($array as $reportKey => $reportItem)
                                                                                        @if ($reportItem != 'Hình ảnh chứa nội dung nhạy cảm')
                                                                                            <a class="list-group-item list-group-item-action"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#reportResponseComment{{ $reportKey }}{{ $keyPhanHoi }}">{{ $reportItem }}</a>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @foreach ($array as $reportKey => $reportItem)
                                                                        <div class="modal fade"
                                                                            id="reportResponseComment{{ $reportKey }}{{ $keyPhanHoi }}"
                                                                            data-bs-backdrop="static"
                                                                            data-bs-keyboard="false" tabindex="-1"
                                                                            aria-labelledby="staticBackdropLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <form action="{{ route('bao-cao') }}"
                                                                                        method="post">
                                                                                        @csrf
                                                                                        <div class="modal-header">
                                                                                            <input type="text"
                                                                                                name="nguoi_dung"
                                                                                                value="" hidden>
                                                                                            <input type="text"
                                                                                                name="bai_dang"
                                                                                                value="{{ $phanHoi->bai_dang_id }}"
                                                                                                hidden>
                                                                                            <input type="text"
                                                                                                name="binh_luan"
                                                                                                value="{{ $phanHoi->id }}"
                                                                                                hidden>
                                                                                            <input type="text"
                                                                                                name="bao_cao"
                                                                                                value="{{ $reportItem }}"
                                                                                                hidden>
                                                                                            <h1 class="modal-title fs-5"
                                                                                                id="staticBackdropLabel">
                                                                                                {{ $reportItem }}
                                                                                            </h1>
                                                                                            <button type="button"
                                                                                                class="btn-close"
                                                                                                data-bs-dismiss="modal"
                                                                                                aria-label="Close"></button>
                                                                                        </div>
                                                                                        <div class="modal-body ">
                                                                                            Chúng tôi sẽ xem xét báo cáo và
                                                                                            thông báo cho
                                                                                            bạn về quyết định của mình.
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#staticBackdrop">Hủy</button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-primary">Gửi</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="d-flex mt-1">
                                                        @if (Auth::id() != null)
                                                            <button style="padding-left: 20px;font-size:.8em"
                                                                class="fw-semibold btn pb-0 pt-0 response"onclick="myFunction({{ $key }})">Phản
                                                                hồi</button>
                                                        @endif
                                                        <div class="fw-semibold"
                                                            style="font-size:.8em;color:rgb(154, 155, 157);padding-left: 10px">
                                                            @if (\Carbon\Carbon::now()->format('d/m/Y') == $phanHoi->updated_at->format('d/m/Y'))
                                                                {{ $phanHoi->updated_at->format('H:i') }}
                                                            @else
                                                                {{ $phanHoi->updated_at->format('d/m/Y') }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    @if (Auth::id() != null)
                                        <div class="d-flex" id="{{ $key }}"
                                            style="visibility:hidden;max-height:0;margin-left:10px;margin-right:5px">
                                            <?php
                                            if ($user->anh_dai_dien != '') {
                                                echo '<img src="/images/added_images/' . $user->anh_dai_dien . '" alt="" width="42em" height="42em" class="rounded-circle" style="object-fit: cover;margin-right:10px">';
                                            } elseif ($user->gioi_tinh == 1) {
                                                echo '<img src="/images/default_images/man.png" alt="" width="42em" height="42em" class="rounded-circle" style="object-fit: cover;margin-right:10px">';
                                            } else {
                                                echo '<img src="/images/default_images/woman.png" alt="" width="42em" height="42em" class="rounded-circle" style="object-fit: cover;margin-right:10px">';
                                            }
                                            ?>
                                            <form
                                                action="{{ route('xl-phan-hoi', ['idBinhLuan' => $item->id, 'idBaiDang' => $baiDang->id]) }}"
                                                class="d-flex flex-fill align-items-center" method="post">
                                                @csrf
                                                <input class="flex-fill form-control rounded-5" type="text"
                                                    name="binh_luan" placeholder="Bình luận ..."
                                                    autocomplete="off">&ensp;
                                                <div class="rounded-3" style="padding-left:5px">
                                                    <button class="btn btn-light pt-1 pb-1 border" type="submit"
                                                        id="button-addon2">
                                                        <img src="{{ URL('images/default_images/paper-plane.png') }}"
                                                            style="width:1.45em;padding-bottom:.1em">
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>


        {{-- Hien thi bao cao bài đăng --}}
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
                                <input type="text" name="nguoi_dung" value="" hidden>
                                <input type="text" name="bai_dang" value="{{ $baiDang->id }}" hidden>
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
<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>
@endsection