@extends('Admin.default')

@section('content')
    <div class="nk-content">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head">
                        <div class="nk-block-head-between flex-wrap gap g-2">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title">Thêm</h2>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <form action="{{ route('sanpham.store') }}" method="post" enctype="multipart/form-data"
                            id="form-create">
                            @csrf
                            <div class="row g-gs">
                                <div class="col-xxl-9">
                                    <div class="gap gy-4">
                                        <div class="gap-col">
                                            <div class="card card-gutter-md">
                                                <div class="card-body">
                                                    <div class="row g-gs">
                                                        <div class="col-lg-6">
                                                            <div class="form-group"><label for="ten_san_pham"
                                                                    class="form-label">Tên sản phẩm</label>
                                                                <div class="form-control-wrap"><input type="text"
                                                                        class="form-control @error('ten_san_pham') is-invalid @enderror"
                                                                        id="ten_san_pham" name="ten_san_pham"
                                                                        onkeyup="ChangeToSlug();"
                                                                        value="{{ old('ten_san_pham') }}" maxlength="100"
                                                                        minlength="1" placeholder="Tên loại sản phẩm"
                                                                        required>
                                                                </div>
                                                                @if ($errors)
                                                                    <span
                                                                        class="text-danger py-1 mt-2">{{ $errors->first('ten_san_pham') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group"><label for="slug"
                                                                    class="form-label">Slug</label>
                                                                <div class="form-control-wrap"><input type="text"
                                                                        class="form-control @error('slug') is-invalid @enderror"
                                                                        maxlength="100" minlength="1" id="slug"
                                                                        name="slug" value="{{ old('slug') }}"
                                                                        placeholder="Slug" required>
                                                                </div>
                                                                @if ($errors)
                                                                    <span
                                                                        class="text-danger py-1 mt-2">{{ $errors->first('slug') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group"><label for="kich_co"
                                                                    class="form-label">Kích cỡ</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-control-wrap">
                                                                        @foreach ($kich_co as $key => $kc)
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    id="checkbox{{ $key }}"
                                                                                    value="{{ $kc->id }}"
                                                                                    name="kich_co[]"
                                                                                    @if (is_array(old('kich_co')) && in_array('val', old('kich_co'))) checked @endif>
                                                                                <label class="form-check-label"
                                                                                    for="checkbox{{ $key }}">{{ $kc->ten}}</label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                @if ($errors)
                                                                    <span
                                                                        class="text-danger py-1 mt-2">{{ $errors->first('kich_co') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group"><label for="so_luong"
                                                                    class="form-label">Số lượng</label>
                                                                <div class="form-control-wrap"><input type="number"
                                                                        class="form-control @error('so_luong') is-invalid @enderror"
                                                                        maxlength="100" minlength="1" id="so_luong"
                                                                        name="so_luong" value="{{ old('so_luong') }}"
                                                                        placeholder="Số lượng" required>
                                                                </div>
                                                                @if ($errors)
                                                                    <span
                                                                        class="text-danger py-1 mt-2">{{ $errors->first('so_luong') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group"><label for="gia_goc"
                                                                    class="form-label">Giá gốc</label>
                                                                <div class="form-control-wrap"><input type="text"
                                                                        class="form-control @error('gia_goc') is-invalid @enderror"
                                                                        maxlength="100" minlength="1" id="gia_goc"
                                                                        name="gia_goc" value="{{ old('gia_goc') }}"
                                                                        placeholder="Giá gốc" required>
                                                                </div>
                                                                @if ($errors)
                                                                    <span
                                                                        class="text-danger py-1 mt-2">{{ $errors->first('gia_goc') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group"><label for="gia"
                                                                    class="form-label">Giá bán</label>
                                                                <div class="form-control-wrap"><input type="text"
                                                                        class="form-control @error('gia') is-invalid @enderror"
                                                                        maxlength="100" minlength="1" id="gia"
                                                                        name="gia" value="{{ old('gia') }}"
                                                                        placeholder="Giá bán" required>
                                                                </div>
                                                                @if ($errors)
                                                                    <span
                                                                        class="text-danger py-1 mt-2">{{ $errors->first('gia') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Mô tả</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="js-quill" name="mo_ta"
                                                                        id="quill_editor" value=""
                                                                        data-toolbar="minimal"
                                                                        data-placeholder="Viết mô tả loại sản phẩm vào đây...">
                                                                    </div>
                                                                    <input type="hidden" name="mo_ta"
                                                                        value="{{ old('mo_ta') }}" maxlength="100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gap-col">
                                            <ul class="d-flex align-items-center gap g-3">
                                                <li><button type="submit" class="btn btn-primary">Lưu</button></li>
                                                <li><a href="{{ url()->previous() }}" class="btn border-0">Quay
                                                        lại</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3">
                                    <div class="card card-gutter-md">
                                        <div class="card-body">
                                            <div class="row g-gs">
                                                <div class="col-12">
                                                    <div class="form-group"><label class="form-label">Ảnh bìa</label>
                                                        <div class="form-control-wrap">
                                                            <div
                                                                class="image-upload-wrap d-flex flex-column align-items-center">
                                                                <div class="media media-huge border">
                                                                    <img id="img" class="w-100 h-100"
                                                                        src="{{ asset('images/avatar/avatar-placeholder.jpg') }}"
                                                                        alt="img">
                                                                </div>
                                                                <div class="pt-3">
                                                                    <input class="upload-image" data-target="img"
                                                                        id="change_img" name="change_img" type="file"
                                                                        max="1" hidden>
                                                                    <label for="change_img"
                                                                        class="btn btn-md btn-primary">Thay đổi</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-note mt-3">Set the product
                                                            thumbnail image. Only *.png, *.jpg and *.jpeg
                                                            image files are accepted.</div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group"><label for="trang_thai"
                                                            class="form-label">Trạng thái</label>
                                                        <div class="form-control-wrap">
                                                            <select class="js-select" name="trang_thai"
                                                                data-search="true" data-sort="false">
                                                                <option value="">Select an option</option>
                                                                @foreach ($trang_thai as $tt)
                                                                    <option value="{{ $tt->id }}"
                                                                        {{ old('trang_thai') == $tt->id ? 'selected' : '' }}>{{ $tt->ten_trang_thai }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @if ($errors)
                                                            <span
                                                                class="text-danger py-1 mt-2">{{ $errors->first('trang_thai') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-12 mt-2">
                                                        <div class="form-group"><label for="id_loai_san_pham"
                                                                class="form-label">Loại sản phẩm</label>
                                                            <div class="form-control-wrap">
                                                                <select class="js-select" name="id_loai_san_pham"
                                                                    data-search="true" data-sort="false">
                                                                    <option value="0" selected>Trống</option>
                                                                    @foreach ($loai_san_pham as $loai)
                                                                        <option value="{{ $loai->id }}"
                                                                            {{ old('id_loai_san_pham') == $loai->id ? 'selected' : '' }}>{{ $loai->ten_loai }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @if ($errors)
                                                                <span
                                                                    class="text-danger py-1 mt-2">{{ $errors->first('id_loai_san_pham') }}</span>
                                                            @endif
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const quill = new Quill('#quill_editor', {
            theme: 'snow'
        });

        const form = document.querySelector('#form-create');
        form.onsubmit = function(e) {
            mo_ta = document.querySelector('input[name=mo_ta]');
            mo_ta.value = JSON.stringify(quill.getContents());

            return true;
        };

        function ChangeToSlug() {
            var title, slug;

            //Lấy text từ thẻ input title
            title = document.getElementById("ten_san_pham").value;

            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('slug').value = slug;
        }
    </script>
@endsection
