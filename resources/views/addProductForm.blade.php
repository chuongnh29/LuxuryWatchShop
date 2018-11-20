<div class="container crud-table">
  <div class="table-wrapper">

    <div class="table-title">
      <div class="row">
        <div class="col-sm-6">
          <h2>@if($type == 'add')Thêm mới sản phẩm @elseif($type == 'edit') Sửa thông tin sản phẩm @endif </h2>
        </div>
        <div class="col-sm-6">
          
          {{--<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm ảnh</span></a>--}}
          <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>  -->                       
        </div>
      </div>
    </div>

          <div class="errors">
            @include('errorValidate')
          </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputEmail4">Tên sản phẩm</label>
        <input type="" class="form-control" @if($type == 'edit') value="{{ $product->name }}" @endif id="" name="tenSP" placeholder="Bắt buộc nhập">
      </div>
        <input type="hidden" name="productID" @if($type == 'edit') value="{{ $product->id }}" @endif>
      <div class="form-group col-md-4">
        <label for="inputPassword4">Thương hiệu</label>
        <select id="inputState" class="form-control" name="thuongHieu">
            @foreach($thuongHieu as $brand)
                <option value="{{ $brand->id }}" @if($type == 'edit' && $product->type_id == $brand->id) selected @endif>{{ $brand->name }}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Giới tính</label>
        <select id="inputState" class="form-control" name="gioiTinh">
            @foreach($gioiTinh as $gender)
                @if($gender->type == 0)<option value="{{ $gender->type }}"@if($type == 'edit' && $product->gender == $gender->type) selected @endif>Nam</option>
                @else
                    <option value="{{ $gender->type }}" @if($type == 'edit' && $product->gender == $gender->type) selected @endif>Nữ</option>
                @endif
            @endforeach
        </select>
      </div>
    </div>
   <div class="form-row">
       <div class="form-group col-md-4">
           <label for="inputPassword4">Loại dây</label>
           <select id="inputState" class="form-control" name="loaiDay">
               @foreach($loaiDay as $day)
                   <option value="{{ $day->id }}" @if($type == 'edit' && $product->strap_id == $day->id) selected @endif>{{ $day->strap_name }}</option>
               @endforeach
           </select>
       </div>

       <div class="form-group col-md-4">
           <label for="inputPassword4">Loại vỏ</label>
           <select id="inputState" class="form-control" name="loaiVo">
               @foreach($loaiVo as $vo)
                   <option value="{{ $vo->id }}" @if($type == 'edit' && $product->case_material_id == $vo->id) selected @endif>{{ $vo->material_name }}</option>
               @endforeach
           </select>
       </div>
       <div class="form-group col-md-4">
           <label for="inputPassword4">Trạng thái sản phẩm</label>
           <select id="inputState" class="form-control" name="trangThaiSP">
               @foreach($trangThaiSP as $trangThai)
                   <option value="{{ $trangThai->id }}" @if($type == 'edit' && $product->product_status_id == $trangThai->id) selected @endif>{{ $trangThai->product_status_name }}</option>
               @endforeach
           </select>
       </div>
   </div>
   <div class="form-row">
       <div class="form-group col-md-4">
           <label for="inputCity">Giá gốc</label>
           <input type="text" class="form-control" @if($type == 'edit') value="{{ $product->unit_price }}" @endif id="inputCity" placeholder="Bắt buộc nhập" name="giaGoc">
       </div>

       <div class="form-group col-md-4">
           <label for="inputAddress">Giá sale</label>
           <input type="text" class="form-control" @if($type == 'edit') value="{{ $product->promotion_price }}" @endif id="inputAddress" placeholder="Bắt buộc nhập" name="giaSale">
       </div>

       <div class="form-group col-md-4">
           <label for="inputAddress">Mô tả ngắn</label>
           <input type="text" class="form-control" name="moTa" id="inputAddress" placeholder="Viết vào đây...">
       </div>
   </div>
      @if($type == 'add')
      <div class="form-group">
          <label for="exampleFormControlFile1">Thêm ảnh</label>
          <input type="file" name="anh" multiple class="form-control-file" id="exampleFormControlFile1">
      </div>
      @endif
    <div class="form-group">
      <label for="inputAddress2">Bài viết</label>
      <textarea name="productPost" id="productPost"></textarea>
    </div>

    <button class="btn btn-primary save">Lưu</button>

    <!-- Edit Modal HTML -->
    {{--<div id="addEmployeeModal" class="modal fade">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">                      --}}
                        {{--<h4 class="modal-title">Thêm ảnh</h4>--}}
                        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body">                    --}}
                        {{--<div class="form-group">--}}
                            {{--<label>Name</label>--}}
                            {{--<input type="text" class="form-control" required>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Email</label>--}}
                            {{--<input type="email" class="form-control" required>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Address</label>--}}
                            {{--<textarea class="form-control" required></textarea>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Phone</label>--}}
                            {{--<input type="text" class="form-control" required>--}}
                        {{--</div>                  --}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">--}}
                        {{--<input type="submit" class="btn btn-success" value="Add">--}}
                    {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}

      {{--</div>--}}

  </div>
      <!-- Edit Modal HTML -->
    <!-- <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Edit Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>                  
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
      </div> -->
      <!-- Delete Modal HTML -->
    <!-- <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
      </div> -->








