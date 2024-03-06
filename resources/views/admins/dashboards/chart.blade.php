

<div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-finance"></i></span>
          Thống Kê Doanh Thu
        </p>
        <a href="{{ url()->full() }}" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <div class="chart-area">
          <div class="h-full">
            <div class="chartjs-size-monitor">
              <div class="chartjs-size-monitor-expand">
                <div></div>
              </div>
              <div class="chartjs-size-monitor-shrink">
                <div></div>
              </div>
            </div>
            <canvas id="big-line-chart" width="2992" height="1000" class="chartjs-render-monitor block" style="height: 400px; width: 1197px;"></canvas>
          </div>
        </div>
      </div>
    </div>
