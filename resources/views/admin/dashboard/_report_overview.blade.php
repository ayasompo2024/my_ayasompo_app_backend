<?php
$report_overview = [
    [
       'text_display' => 'App Customers',
        'number_display' => 123,
        'route' => 'admin.dashboard',
        'url' => null,
        'icon' => 'bi bi-people-fill',
    ],
    [
       'text_display' => 'Core Customers',
        'number_display' => 123,
        'route' => 'admin.dashboard',
        'url' => null,
        'icon' => 'bi bi-people-fill',
    ],
    [
        'text_display' => 'Products',
        'number_display' => 'admin.dashboard',
        'route' => 'admin.shop.index',
        'url' => null,
        'icon' => 'bi bi-shop',
    ],
    [
       'text_display' => 'Products Type',
        'number_display' => 'admin.dashboard',
        'route' => 'admin.search-history.index',
        'url' => 'admin/dashoard',
        'icon' => 'bi bi-search-heart',
    ],
];
?>
@foreach ($report_overview as $item)
<div class="col-md-4 px-1">
    <div class="card">
        <div class="card-body row tw-justify-between tw-items-center">
            <div class="col-9  text-center" style="width: 60px">
                {{-- <a class="text-dark" href="{{ route($item['route']) }}"> --}}
                <a class="text-dark" href="">
                    <i class="{{ $item['icon']}} tw-text-lg mr-3"></i>
                    {{ $item['text_display'] }} <br>
                </a>
            </div>
            <div class="circle_percent" data-percent="{{ $item['number_display'] }} ">
                <div class="circle_inner">
                    <div class="round_per"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@push('child-css')
<style>
    .circle_percent {
        font-size: 60px;
        width: 1em;
        height: 1em;
        position: relative;
        background: #eee;
        border-radius: 50%;
        overflow: hidden;
        display: inline-block;
        /* margin: 20px; */
    }

    .circle_inner {
        position: absolute;
        left: 0;
        top: 0;
        width: 1em;
        height: 1em;
        clip: rect(0 1em 1em 0.5em);
    }

    .round_per {
        position: absolute;
        left: 0;
        top: 0;
        width: 1em;
        height: 1em;
        background: #e4a6d2;
        clip: rect(0 1em 1em 0.5em);
        transform: rotate(180deg);
        transition: 1.05s;
    }

    .percent_more .circle_inner {
        clip: rect(0 0.5em 1em 0em);
    }

    .percent_more:after {
        position: absolute;
        left: 0.5em;
        top: 0em;
        right: 0;
        bottom: 0;
        background: #e4a6d2;
        content: "";
    }

    .circle_inbox {
        position: absolute;
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
        background: #fff;
        z-index: 3;
        border-radius: 50%;
    }

    .percent_text {
        position: absolute;
        font-size: 20px;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 3;
    }
</style>
@endpush

@push('child-scripts')
<script>
    $(".circle_percent").each(function () {
  var $this = $(this),
    $dataV = $this.data("percent"),
    $dataDeg = $dataV * 3.6,
    $round = $this.find(".round_per");
  $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
  $this.append(
    '<div class="circle_inbox"><span class="percent_text"></span></div>'
  );
  $this.prop("Counter", 0).animate(
    { Counter: $dataV },
    {
      duration: 2000,
      easing: "swing",
      step: function (now) {
        $this.find(".percent_text").text(Math.ceil(now));
      }
    }
  );
  if ($dataV >= 51) {
    $round.css("transform", "rotate(" + 360 + "deg)");
    setTimeout(function () {
      $this.addClass("percent_more");
    }, 1000);
    setTimeout(function () {
      $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
    }, 1000);
  }
});
</script>
@endpush