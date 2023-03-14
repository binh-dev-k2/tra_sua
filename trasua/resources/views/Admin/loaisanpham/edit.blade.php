@extends('Admin.default')

@section('content')
    <div class="nk-content">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head">
                        <div class="nk-block-head-between flex-wrap gap g-2">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title">Sửa loại sản phẩm</h2>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <form action="{{ route('loaisanpham.update', ['slug' => $loai_san_pham->slug]) }}" method="post" enctype="multipart/form-data" id="form-edit">
                            @csrf
                            @method('put')
                            <div class="row g-gs">
                                <div class="col-xxl-12">
                                    <div class="gap gy-4">
                                        <div class="gap-col">
                                            <div class="card card-gutter-md">
                                                <div class="card-body">
                                                    <div class="row g-gs">
                                                        <div class="col-lg-6">
                                                            <div class="form-group"><label for="ten_loai"
                                                                    class="form-label">Tên loại sản phẩm</label>
                                                                <div class="form-control-wrap"><input type="text"
                                                                        class="form-control @error('ten_loai') is-invalid @enderror"
                                                                        id="ten_loai" name="ten_loai" onkeyup="ChangeToSlug();"
                                                                        value="{{ $loai_san_pham->ten_loai }}" maxlength="100" minlength="1"
                                                                        placeholder="Tên loại sản phẩm" required>
                                                                </div>
                                                                @if ($errors)
                                                                    <span
                                                                        class="text-danger py-1 mt-2">{{ $errors->first('ten_loai') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group"><label for="slug"
                                                                        class="form-label">Slug</label>
                                                                    <div class="form-control-wrap"><input type="text"
                                                                            class="form-control @error('slug') is-invalid @enderror" maxlength="100" minlength="1"
                                                                            id="slug" name="slug"
                                                                            value="{{ $loai_san_pham->slug }}" placeholder="Slug"
                                                                            required>
                                                                    </div>
                                                                    @if ($errors)
                                                                        <span
                                                                            class="text-danger py-1 mt-2">{{ $errors->first('slug') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Mô tả</label>
                                                                    <div class="form-control-wrap">
                                                                        <div class="js-quill" name="mo_ta"
                                                                            id="quill_editor"
                                                                            value="{!! $loai_san_pham->mo_ta !!}"
                                                                            data-toolbar="minimal"
                                                                            data-placeholder="Viết mô tả loại sản phẩm vào đây...">
                                                                        </div>
                                                                        <input type="hidden" name="mo_ta"
                                                                            value="{{ $loai_san_pham->mo_ta }}" maxlength="100">
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

        let mo_ta = document.querySelector('input[name=mo_ta]').value;
        quill.setContents(quill.clipboard.convert(mo_ta));

        const form = document.querySelector('#form-edit');
        form.onsubmit = function(e) {
            mo_ta = document.querySelector('input[name=mo_ta]');
            mo_ta.value = JSON.stringify(quill.getContents());

            return true;
        };

        function ChangeToSlug() {
            var title, slug;

            //Lấy text từ thẻ input title
            title = document.getElementById("ten_loai").value;

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
