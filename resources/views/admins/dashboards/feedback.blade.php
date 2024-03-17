
<div class="card has-table mt-3">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Danh Sách Phản Hồi Khách Hàng
        </p>
        <a href="{{ url()->full() }}" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <table>
          <thead>
          <tr>
            <th>STT</th>
            <th>Tên Khách Hàng</th>
            <th>Gmail</th>
            <th>Nội Dung</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          @if(count($feedbacks) > 0)
            @foreach($feedbacks as $feedback)
              <tr>
                <td>{{$feedback->id}}</td>
                <td data-label="Name">{{$feedback->name}}</td>
                <td data-label="Email">{{$feedback->email}}</td>
                <td data-label="Massage">{{$feedback->message}}</td>
              </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center">Không có danh mục nào.</td>
            </tr>
          @endif
          </tbody>
        </table>
         <!-- pagination -->
        <ul class="pagination flex float-right">
            <li class="page-item {{ ($feedbacks->currentPage() == 1) ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $feedbacks->url(1) }}">
                  <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $feedbacks->lastPage(); $i++)
              <li class="page-item {{ ($feedbacks->currentPage() == $i) ? 'active' : '' }}">
                  <a class="page-link" href="{{ $feedbacks->url($i) }}">{{ $i }}</a>
              </li>
            @endfor
            <li class="page-item {{ ($feedbacks->currentPage() == $feedbacks->lastPage()) ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $feedbacks->url($feedbacks->lastPage()) }}">
                  <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
      </div>
    </div>