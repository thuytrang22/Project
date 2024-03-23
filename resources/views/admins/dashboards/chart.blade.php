<div class="card mb-6">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-finance"></i></span>
      Thống Kê Doanh Thu
    </p>
    <div class="gap-6 flex" style="margin-right: 30px;">
      <div class="flex items-center mr-8">
        <p id="noteRed"></p>
        <label for="noteRed">Chi phí</label>
      </div>
      <div class="flex items-center">
        <p id="noteGreen"></p>
        <label for="noteGreen">Doanh Thu</label>
      </div>
      <div class="flex items-center">
        <p id="noteBlue"></p>
        <label for="noteBlue">Lãi</label>
      </div>
    </div>
    <input id="revenues-start-date" type="text" class="datepicker card-header-icon">
    <span class="card-header-icon">=></span>
    <input id="revenues-end-date" type="text" class="datepicker card-header-icon">
    <span id="chart-reload" class="card-header-icon"><i class="mdi mdi-reload"></i></span>
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
        <canvas id="big-line-chart" width="2992" height="1000" class="chartjs-render-monitor block"></canvas>
      </div>
    </div>
  </div>
</div>