@extends('.layouts.master')
@section('content')
<form action="{{route('maintenance.cost.store')}}" method="POST" class="card mt-3" enctype="multipart/form-data">
    <div class="modal-header">
        <h4 class="modal-title">Thêm Chi Phí Vận Hành</h4>
        <a class="btn btn-outline-warning"  href="{{ route('maintenance.cost') }}">Quay lại</a>
    </div>
    <div class="card-body">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Tên Chi Phí:</label>
            <input
                type="text"
                name="name"
                value="{{old('name')}}"
                class="form-control"
                @error('name') is-invalid @enderror
            >
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Số Tiền:</label>
            <input
                type="text"
                name="expense"
                value="{{old('expense')}}"
                class="form-control"
                @error('expense') is-invalid @enderror
            >
            @error('expense')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Loại:</label>
            <select id="type" name="type" class="block mt-1 w-full form-select rounded-md shadow-sm">
            @foreach($costTypes as $costType)
                <option value="{{$costType->code}}">{{$costType->name}}</option>
                @endforeach
            </select>
            @error('type')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="card-footer text-end d-flex">
        <button class="btn btn-primary mr-2" type="submit">
            Thêm
        </button>
    </div>
</form>
@endsection