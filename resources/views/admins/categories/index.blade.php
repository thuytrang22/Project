@extends('.layouts.admin')
@section('content')

@if ( session('store'))
  <div id="store" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    Added category successfully!!!
  </div>
@endif

@if ( session('update'))
  <div id="update" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    Edited list successfully!!!
  </div>
@endif

@if ( session('destroy'))
  <div id="destroy" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    Directory deletion successful!!!
  </div>
@endif

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Categories</li>
    </ul>
  </div>
</section>

  <section class="section main-section" style="padding-bottom: 60px !important;">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-buffer"></i></span>
          List Categories
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
    <div class="card-body">
    <div class="row justify-content-between">
        <div class="flex" style="padding: 10px">
                <!-- feature create -->
                <a class="button blue" href="{{route('categories.create')}}">
                Add Category
                </a>
            <!-- feature search -->
            <form action="?" class="col-auto ms-auto navbar-end">
                <div class="input-group">
                    <input type="text" name="keywords" class="form-control" placeholder="Search categories..." />
                    <button type="submit" class="button green">Go!</button>
                </div>
            </form>
    </div></div>
      <div class="card-content">
        <table>
          <thead>
          <tr class="text-center table-active">
                <th>
                    <a class="flex content-center items-center" href="{{ route('categories', ['sortBy' => 'id', 'sortDirection' => ($sortDirection == 'asc' && $sortBy == 'id') ? 'desc' : 'asc']) }}">
                        No
                        <div class="sort">
                            <div class="arrow-up"></div>
                            <div class="arrow-down"></div>
                        </div>
                    </a>
                </th>
                <th>Category Name</th>
                <th width="280px">Action</th>
            </tr>
          </thead>
          <tbody>
            @if(count($categories) > 0)
            @foreach($categories as $category)
            <tr class="text-center">
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <div class="flex gap-10">
                        <!-- feature show -->
                        <a class="btn btn-icon btn-outline-warning" href="{{ route('category.menus', ['category' => $category->id]) }}">
                          <img src="/images/menu.png" alt="">
                        </a>

                        <!-- feature update -->
                        <a class="btn btn-icon btn-outline-warning btnEdit" href="{{route('categories.edit',$category->id)}}">
                            <img src="/images/editing.png" alt="">
                        </a>

                        <!-- feature delete -->
                        <form method="POST" action="{{ route('categories.destroy', ['id' => $category->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-warning btn-icon">
                                <img src="/images/delete.png" alt="">
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center">There are no categories</td>
            </tr>
            @endif
        </tbody>
        </table>
      <!-- pagination -->
<ul class="pagination flex float-right">
    <li class="page-item {{ ($categories->currentPage() == 1) ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $categories->url(1) }}"><span aria-hidden="true">&laquo;</span></a>
    </li>
    @for ($i = 1; $i <= $categories->lastPage(); $i++)
        <li class="page-item {{ ($categories->currentPage() == $i) ? 'active' : '' }}">
            <a class="page-link" href="{{ $categories->url($i) }}">{{ $i }}</a>
        </li>
        @endfor
        <li class="page-item {{ ($categories->currentPage() == $categories->lastPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $categories->url($categories->lastPage()) }}"><span aria-hidden="true">&raquo;</span></a>
        </li>
</ul>
    </div>

  </section>

  @endsection