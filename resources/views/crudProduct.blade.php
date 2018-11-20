<div class="container crud-table">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2><b>Sản phẩm</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('addProductForm') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Thêm sản phẩm mới</span></a>
                    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>                        
                </div>
            </div>

      </div>
        <form action="{{ route('product') }}" method="get">
            <input type="hidden" name="type" value="timKiem">
            <div class="form-row">
                <div class=""></div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Tên sản phẩm</label>
                    <input type="textSearch" class="form-control" id="inputEmail4" placeholder="Nhập tên sản phẩm" name="textSearch">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Thương hiệu</label>
                    <select id="inputState" class="form-control" name="thuongHieu">
                        <option value="none" selected>Có thể chọn</option>
                        @foreach($thuongHieu as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
            </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Giới tính</label>
                    <select id="inputState" class="form-control" name="gioiTinh">
                        <option value="none" selected>Có thể chọn</option>
                        @foreach($gioiTinh as $gender)
                            @if($gender->type == 0)<option value="{{ $gender->type }}">Nam</option>
                            @else
                                <option value="{{ $gender->type }}">Nữ</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputCity">Loại dây</label>
                    <select id="inputState" class="form-control" name="loaiDay">
                        <option value="none" selected>Có thể chọn</option>
                        @foreach($loaiDay as $day)
                        <option value="{{ $day->id }}">{{ $day->strap_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Loại vỏ</label>
                    <select id="inputState" class="form-control" name="loaiVo">
                        <option value="none" selected>Có thể chọn</option>
                        @foreach($loaiVo as $vo)
                            <option value="{{ $vo->id }}">{{ $vo->material_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Trạng thái sản phẩm</label>
                    <select id="inputState" class="form-control" name="trangThaiSP">
                        <option value="none" selected>Có thể chọn</option>
                        @foreach($trangThaiSP as $trangThai)
                            <option value="{{ $trangThai->id }}">{{ $trangThai->ten_trang_thai }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div style="text-align: center;"><button type="submit" class="btn btn-primary">Tìm kiếm</button></div>
        </form>
      <table class="table table-striped table-hover" style="margin-top: 50px;">
        <thead>
            <tr>

                <th>Ảnh</th>
                <th>Tên <a href=""><i class="fas fa-arrow-alt-circle-down"></i></a></th>
                <th>Thương hiệu</th>
                <th>Giới tính</th>
                <th style="width: 8rem;">Giá bán <a href=""><i class="fas fa-arrow-alt-circle-down"></i></a></th>
                <th style="width: 8rem;">Giá sale <a href=""><i class="fas fa-arrow-alt-circle-down"></i></a></th>
                <th>Loại dây</th>
                <th>Loại vỏ</th>
                <th>Trạng thái hàng</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>

                <td><img src="public/storage/img/product/{{ $product->image }}" style="max-width: 4rem; max-height: 4rem;"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->name_type }}</td>
                @if($product->gender == 0)
                    <td>Nam</td>
                @else
                    <td>Nữ</td>
                @endif
                <td>{{ $product->unit_price }} VND</td>
                <td>{{ $product->promotion_price }} VND</td>
                <td>{{ $product->loai_day }}</td>
                <td>{{ $product->loai_vo }}</td>
                <td>{{ $product->product_status }}</td>
                <td class="edit-delete-block">
                    <a href="{{ route('editProductForm',['id'=>$product->id]) }}" class="edit"><i class="material-icons" title="Edit">&#xE254;</i></a>
                    <a href="{{ route('delete',['id'=>$product->id]) }}" class="delete"><i class="material-icons" title="Delete">&#xE872;</i></a>
                    <input type="hidden" name="name" value="{{ $product->name }}">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="clearfix">

        {{ $products->onEachSide(1)->links() }}
    </div>
</div>
</div>
<!-- Edit Modal HTML -->
    <!-- <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Add Employee</h4>
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
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div> -->
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
