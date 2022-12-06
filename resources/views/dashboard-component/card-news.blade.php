<div class="card">
    <div class="card-body">
        <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
                <span class="badge bg-label-secondary"> <img src="../assets/img/icons/unicons/news-regular-24.png"
                        alt="Credit Card" class="rounded"></span>

            </div>
            <div class="dropdown">
                <a href="{{ route('show-news') }}"><span class="btn btn-icon btn-secondary"><i
                            class='bx bx-chevron-right'></i></span></a>
            </div>
        </div>
        <span>Số tin tức</span>
        <h2 class="card-title text-nowrap mb-1">{{ $countnews }}</h2>
        {{--  <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>  --}}
    </div>
</div>
