<form method="post" action="{{route('danhmuc.store')}}" class="form-horizontal">
    @csrf
    <div class="form-group"><label class="col-sm-2 control-label">Mã danh mục</label>

        <div class="col-sm-10"><input type="text" name="id" disabled placeholder="Auto String" class="form-control"></div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Tên danh mục <span class="text-danger">(*)</span></label>

        <div class="col-sm-10"><input type="text" name="name" placeholder="Nhập tên danh mục" value="{{old('name')}}" class="form-control {{$errors->has('name') ? "is-invalid" : ""}}">
            @if ($errors->has('name'))
              <p class="error-message">* {{$errors->first('name')}}</p>
            @endif
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
            <button class="btn btn-white" type="reset" style="margin-right: 2px;">Hủy</button>
            <button class="btn btn-primary" type="submit">Thêm mới</button>
        </div>
    </div>
</form>