@extends('.layouts.master')
@section('content')
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-auto">
                        <a href="{{route('create')}}" class="btn btn-primary">
                            <i class="fas fe-circle-plus"></i>Thêm Món Ăn
                        </a>
                </div>
                <form action="?" class="col-auto ms-auto">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control "
                               value=""
                               placeholder="search name user ..."/>
                        <button type="submit" class="btn btn-secondary">Go!</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover m-0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Món</th>
                        <th>Hình Ảnh</th>
                        <th>Chi Tiết</th>
                        <th>Giá tiền</th>
                        <th width="280px">Hoạt Động</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="card-body pb-0" id="pagination">
            
        </div>

@endsection