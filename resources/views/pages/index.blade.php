@extends('.layouts.page')
@section('content')
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+84 332 412 298</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mở cửa: 11AM - 23PM</span></i>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="{{route('pages')}}">Hana Sushi</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Trang Chủ</a></li>
          <li><a class="nav-link scrollto" href="#about">Về Chúng Tôi</a></li>
          <li><a class="nav-link scrollto" href="#menu">Thực Đơn</a></li>
          <li><a class="nav-link scrollto" href="#specials">Món Bán Chạy</a></li>
          <li><a class="nav-link scrollto" href="#events">Sự Kiện</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Không Gian</a></li>
          <li><a class="nav-link scrollto" href="#contact">Liên Hệ</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Đặt Bàn</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Chào Mừng Bạn Đến Với <span>Hana Sushi</span></h1><br>
          <h2>Cung cấp thực phẩm tuyệt vời trong hơn 18 năm!</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Thực Đơn</a>
            <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Đặt Bàn</a>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="assets/img/about.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>NHÀ HÀNG ẨM THỰC NHẬT BẢN.</h3>
            <p class="fst-italic">
              Hana Sushi - Hana nghĩa tiếng việt là bông hoa.
              Ý nghĩa nhà hàng mang đến cho khách hàng những miếng sushi tinh tế đẹp đẽ như bông hoa.
              Mong muốn tạo sự hài lòng cao nhất cho thực khách khi được thưởng thức các món ăn Nhật Bản tươi ngon, chọn lọc tại nhà hàng.
            </p>
            <p>
              Những lát cắt tinh tế luôn giữ được nguyên hương vị đại dương mộc mạc, 
              sử dụng từ những phần cá tươi ngon nhất, từng lát cá căng bóng mềm mọng, 
              ngọt đậm đà, vị mát lạnh và béo ngậy đặc trưng.
            </p>
            <p>Sushi lại được cân đối giữa vị chua của giấm, 
              vị ngọt đặc trưng của thịt cá tươi và vị cay nồng của nước chấm mù tạt, 
              đủ mỹ vị tươi ngon để mang lại cho thực khách trải nghiệm hạnh phúc nhất!</p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>TẠI SAO LÀ CHÚNG TÔI</h2>
          <p>Tại sao chọn nhà hàng của chúng tôi</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Người đầu bếp tài hoa với hơn 30 năm kinh nghiệm</h4>
              <p>Chuyên gia Chiba Kazuhiko luôn tâm niệm rằng: “Ăn ngon vì sức khỏe”. 
                Chính vì thế tại Sushi Kei, cách chế biến món ăn luôn hạn chế sử dụng 
                đường và không sử dụng các gia vị hóa học, chỉ chú trọng vào việc làm 
                nổi bật sự tươi ngon, thuần khiết tự nhiên của thực phẩm.</p>
              <p>Các món ăn của bếp trưởng Chiba chinh phục mọi giác quan bởi hương vị đậm
                 chất Nhật Bản cùng cách bài trí tỉ mỉ, tinh tế và gói trọn cả tình yêu với nghề của người đầu bếp.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Nhà hàng trầm ấm, đậm chất Nhật Bản</h4>
              <p>Không gian Hana Sushi kết hợp giữa truyền thống và hiện đại nhưng 
                vẫn mang tới cho thực khách cảm giác đậm chất Nhật Bản. 
                Từ những trang trí hoa văn tinh tế trên tường, trần nhà hàng đến thiết kế quầy bar, 
                bếp lịch sự, Hana Sushi thực sự là một Nhật Bản thu nhỏ giữa đất Việt. Trang trí gần 
                gũi với thiên nhiên như trong văn hóa Nhật.</p>
              <p>
                Nhà hàng Hana Sushi hứa hẹn là một trong những điểm đến lý 
                tưởng cho thực khách muốn trải nghiệm.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4>18 năm 1 chặng đường phát triển</h4>
              <p>18 năm là hành trình tuyệt vời của Nhà hàng Nhật Bản Hana Sushi,
                 là nỗ lực cho ước mơ về một thế giới ẩm thực Nhật độc đáo giữa lòng Hà Nội.
                  Nhà hàng Nhật Bản Hana Sushi tọa lạc con phố: 
                   Hana Sushi số 90 Nguyễn Trãi, Quận Thanh Xuân, Hà Nội. </p> 
              <p>Với phương châm “Luôn nỗ lực phát triển vì niềm tin và sự hài lòng của khách hàng”,
                 Nhà hàng Hana Sushi luôn giữ gìn phong cách phục vụ chu đáo cùng những món ăn thượng
                  hạng mang.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Thực Đơn</h2>
          <p>Kiểm tra thực đơn ngon của chúng tôi</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Tất cả</li>
              <li data-filter=".filter-starters">Món Khai Vị</li>
              <li data-filter=".filter-salads">Món Salads</li>
              <li data-filter=".filter-specialty">Món chính</li>
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
          @foreach ($allMores as $dish)
            <div class="col-lg-6 menu-item filter-starters">
              <img src="{{ asset('storage/' .substr($dish->public, 7)) }}" class="menu-img" alt="">
              <div class="flex-container">
                <div class="menu-content">
                  <a href="{{ url()->full() }}">{{ $dish->name }}</a><span>{{ number_format($dish->price) }} <u>đ</u></span>
                </div>
                <div class="menu-ingredients">
                  <span>Thành phần: {{ ($dish->detail) }}</span>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
          @foreach ($allMores as $dish)
            <div class="col-lg-6 menu-item filter-salads">
              <img src="{{ asset('storage/' .substr($dish->public, 7)) }}" class="menu-img" alt="">
              <div class="flex-container">
                <div class="menu-content">
                  <a href="{{ url()->full() }}">{{ $dish->name }}</a><span>{{ number_format($dish->price) }} <u>đ</u></span>
                </div>
                <div class="menu-ingredients">
                  <span>Thành phần: {{ ($dish->detail) }}</span>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
          @foreach ($allMores as $dish)
            <div class="col-lg-6 menu-item filter-specialty">
              <img src="{{ asset('storage/' .substr($dish->public, 7)) }}" class="menu-img" alt="">
              <div class="flex-container">
                <div class="menu-content">
                  <a href="{{ url()->full() }}">{{ $dish->name }}</a><span>{{ number_format($dish->price) }} <u>đ</u></span>
                </div>
                <div class="menu-ingredients">
                  <span>Thành phần: {{ ($dish->detail) }}</span>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Món Bán Chạy Section ======= -->
    <section id="specials" class="specials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Món Bán Chạy</h2>
          <p>Các Món Bán Chạy Của Chúng Tôi</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Sushi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Tempura </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Sashimi </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4"> Mì Udon</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5"> Bánh mochi</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Sushi cá hồi</h3>
                    <p class="fst-italic">
                      Sushi cá hồi là một món ăn Nhật Bản phổ biến và được yêu thích trên toàn thế giới.
                       Nó được làm từ các lát cá hồi tươi hoặc đông lạnh, được cắt thành từng miếng nhỏ 
                       và đặt lên trên cơ sở cơm trắng được phủ một lớp gia vị gạo dầu mỡ (sushi rice) có 
                       hỗn hợp giấm, đường, và muối.</p>
                    <p>Cá hồi thường được chọn làm nguyên liệu cho sushi vì vị ngọt tự nhiên và
                       đặc trưng của nó, cùng với kết cấu mềm mịn.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/sushi-ca-hoi-song.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Các món Tempura</h3>
                    <p class="fst-italic">Tempura là một món ăn Nhật Bản phổ biến và được biết đến trên toàn thế giới.
                       Đây là một phần của ẩm thực Nhật Bản được biết đến với sự nhẹ nhàng, giòn rụm và hương vị tuyệt vời.
                        Tempura thường được làm từ các loại rau củ, hải sản hoặc thậm chí là thịt, 
                        được phủ một lớp bột chiên giòn và chiên trong dầu nóng.</p>
                    <p>Các thành phần thường được sử dụng trong tempura bao gồm tôm, cá, cua, khoai tây, bí ngô, cà rốt, hành tây,
                       su hào, bông cải và nhiều loại rau khác.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/tempura.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Các món Sashimi</h3>
                    <p class="fst-italic">Sashimi là một trong những món ăn truyền thống của Nhật Bản,
                       đặc biệt nổi tiếng với vị tươi ngon và cách chế biến tinh tế. Không giống như sushi,
                        sashimi là các lát cá, hải sản hoặc thậm chí là
                       thịt được cắt mỏng và được phục vụ không kèm cơm trắng (sushi rice).</p>
                    <p>Sashimi thường được làm từ các loại cá như cá hồi (salmon), cá ngừ (tuna),
                       cá hấp (yellowtail), cá sò điệp (scallop), cá trích (mackerel) và nhiều loại khác. Ngoài ra,
                       sashimi cũng có thể được làm từ các loại hải sản như tôm, sò điệp, sò điệp cua, bạch tuộc và hàu.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/sashimi.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Các loại mì Udon</h3>
                    <p class="fst-italic">Mì Udon là một trong những loại mì truyền thống của ẩm thực Nhật Bản.
                       Nó được làm từ bột mỳ,
                       nước và muối, có kết cấu dày và mềm mại, tạo cảm giác no lâu sau khi ăn.</p>
                    <p>Mì udon được đặt trong một tô nước dùng dashi (nước dùng từ cá hoặc rong biển),
                       thường kèm theo topping như mitsuba (loại rau Nhật tương tự như cần tây),
                        hành phi, nori (tảo biển), hoặc tempura.
                       Các loại mì udon Kake Udon, Tempura Udon, Yaki Udon, Nabeyaki Udon, Curry Udon.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/udom.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Các loại bánh Mochi</h3>
                    <p class="fst-italic">Bánh mochi là một món truyền thống của ẩm thực Nhật Bản,
                       được làm từ gạo nếp (glutinous rice) hoặc bột gạo nếp, đường và nước.
                       Bánh mochi có vị ngọt và có một kết cấu đặc trưng mềm, đàn hồi và nhồi nhét bên trong.</p>
                    <p>Các loại bánh Daifuku Mochi, Ichigo Daifuku, Yomogi Mochi, Kirimochi, Sakuramochi, Kagami Mochi.
                      Những loại bánh mochi này không chỉ ngon mà còn thể hiện sự đa dạng và sáng tạo trong ẩm thực Nhật Bản.
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/mochi.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Món Bán Chạy Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Khự Kiện</h2>
          <p>Tổ chức sự kiện của bạn tại nhà hàng của chúng tôi</p>
        </div>

        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/không gian 1.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Tổ chức sinh nhật</h3>
                  <p class="fst-italic">
                  Hương Vị Đẳng Cấp Nhật Bản
                  </p>
                  <p>
                  Với đội ngũ đầu bếp tài năng và kinh nghiệm, chúng tôi cam kết sử dụng những nguyên liệu tươi ngon nhất
                   để tạo ra những món sushi đỉnh cao. Cá hồi đỏ lấp lánh, tôm tươi mọng, vàng vàng tempura, hay các loại rau củ tươi sạch -
                   tất cả được kỹ lưỡng chế biến để mang đến cho bạn trải nghiệm ẩm thực không thể quên.
                  </p>
                  <p class="fst-italic">Không Gian Sang Trọng và Ấm Cúng </p>
                  <p>Với thiết kế hiện đại và không gian thoải mái, nhà hàng Hono là nơi lý tưởng cho các buổi tiệc đặc biệt.
                     Từ các bàn ghế tiện nghi đến ánh sáng dịu dàng, mọi chi tiết đều được chăm chút để tạo ra một không gian
                      ấm áp và sang trọng.</p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/không gian 2.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Tiệc riêng tư</h3>
                  <p class="fst-italic">
                    Không Gian Riêng Tư Sang Trọng
                  </p>
                  <p>
                    Với các phòng tiệc riêng tư được thiết kế đẹp mắt và sang trọng,
                    "Hana Sushi" là nơi lý tưởng cho các buổi tiệc sinh nhật, kỷ niệm, 
                    họp mặt gia đình hoặc các sự kiện đặc biệt khác. Không gian rộng rãi
                    và thoải mái sẽ mang đến cho bạn và khách mời một không gian riêng 
                    biệt để tận hưởng những khoảnh khắc đáng nhớ.
                  </p>
                  <p class="fst-italic">
                    Thực Đơn Phong Phú và Đa Dạng
                  </p>
                  <p>
                    Với đội ngũ đầu bếp chuyên nghiệp và tài năng, "Góc Bếp Xanh" tự hào mang đến
                    cho bạn một thực đơn phong phú và đa dạng. Chúng tôi cam kết sử dụng nguyên liệu tươi ngon
                    và chất lượng nhất để tạo ra những món ăn ngon miệng và đáp ứng mọi yêu cầu dinh dưỡng
                    và khẩu vị.
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/không gian 3.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Tiệc khác</h3>
                  <p class="fst-italic">
                    Dịch Vụ Tận Tâm và Chuyên Nghiệp
                  </p>
                  <p>
                    Đội ngũ nhân viên của chúng tôi sẽ luôn sẵn lòng hỗ trợ bạn trong việc tổ chức 
                    mọi chi tiết của buổi tiệc riêng tư. Từ việc lên kế hoạch thực đơn,
                    trang trí không gian đến phục vụ và giải trí, chúng tôi sẽ đảm bảo 
                    mọi thứ diễn ra một cách suôn sẻ và đáng nhớ.
                </p>
                <p class="fst-italic">Liên Hệ Và Đặt Tiệc Ngay Hôm Nay</p>
                <p>Hãy để Nhà Hàng "Hana Sushi" là điểm đến lý tưởng cho bữa tiệc của bạn. 
                  Đặt tiệc ngay hôm nay để trải nghiệm không gian ẩm thực tuyệt vời và dịch 
                  vụ chuyên nghiệp tại chúng tôi. Chúng tôi mong được chào đón bạn đến với nhà hàng của chúng tôi!</p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->

    <!-- ======= Đặt Bàn Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Đặt Bàn</h2>
        </div>

        <form action="{{ route('book.table') }}" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
          @csrf
          <div class="row">
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Nhập Tên" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Nhập Email" data-rule="email" data-msg="Please enter a valid email">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập SĐT" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="date" name="booking_date" class="form-control" id="date" placeholder="Ngày" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="time" class="form-control" name="time" id="time" placeholder="Giờ" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="number" class="form-control" name="people" id="people" placeholder="Số Lượng Người" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Ghi Chú"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Yêu cầu đặt bàn của bạn đã được gửi. Chúng tôi sẽ gọi lại hoặc gửi Email để xác nhận việc đặt chỗ của bạn. Cảm ơn!</div>
          </div>
          <div class="text-center"><button type="submit">Đặt Bàn</button></div>
        </form>

      </div>
    </section><!-- End Đặt Bàn Section -->

    <!-- ======= Đánh Giá Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Đánh Giá</h2>
          <p>Họ đang nói gì về chúng tôi</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Đánh Giá Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Không Gian</h2>
          <p>Một Số Hình Ảnh Từ Nhà Hàng Chúng Tôi</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-1.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-2.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-3.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-4.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-5.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-6.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-7.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-8.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Liên Hệ</h2>
          <p>Liên Hệ Chúng Tôi</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Địa chỉ:</h4>
                <p>90 Nguyễn Trãi, Thanh Xuân, Hà Nội.</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Giờ mở cửa:</h4>
                <p>
                  Từ Thứ 2 - Đến Thứ 7:<br>
                  11:00 AM - 2300 PM
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>hanasushi@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Số điện thoại:</h4>
                <p>+84 332 412 298</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="{{ route('send.feedback') }}" method="post" role="form" >
              @csrf
              <div class="section-title">
                <h2>Gửi Ý Kiến Góp Ý Của Bạn Cho Chúng Tôi</h2>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Tên Của Bạn" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email Của Bạn" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8" placeholder="Nội Dung" required></textarea>
              </div>
              <div class="text-center mt-3">
                <button type="submit">Gửi Tin Nhắn</button>
              </div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>NHÀ HÀNG</h3>
              <p>
              số 90 Nguyễn Trãi, <br>
              Quận Thanh Xuân, Hà Nội.
                <br><br>
                <strong>Phone:</strong> +84 332 412 298<br>
                <strong>Email:</strong> hanasushi@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="{{ url()->full() }}" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="{{ url()->full() }}" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="{{ url()->full() }}" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="{{ url()->full() }}" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="{{ url()->full() }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Danh Mục</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url()->full() }}">Tràn Chủ</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url()->full() }}">Về Chúng Tôi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url()->full() }}">Dịch Vụ</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url()->full() }}">Điều Khoản Dịch Vụ</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url()->full() }}">Chính Sách Bảo Mật</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url()->full() }}">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url()->full() }}">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url()->full() }}">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url()->full() }}">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url()->full() }}">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="{{ url()->full() }}" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection