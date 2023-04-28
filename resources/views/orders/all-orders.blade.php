@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="cat-order" class="card w-100 my-3 d-flex flex-row py-3 border-0">
            @foreach ($categories as $categroy)
                <div class="row cat-item mx-2">
                    <a href="">
                        <img src="{{ asset('images/img-placeholder.png') }}"
                            style="width: 50px; height: 50px; object-fit:cover " alt="Avatar" />
                        <h6 class="contact-txt-color-1 fw-bold">{{ $categroy->name }}</h6>
                    </a>
                </div>
            @endforeach
        </div>

        @if (session('message'))
            <div class="alert alert-success mt-5">{{ session('message') }}</div>
        @endif

        <div class="d-flex flex-wrap flex-lg-nowrap ">
            {{-- filtter card --}}
            <div class="col-12 col-lg-3 card rounded-4 border-0" style="max-height: 672px">
                <div class="filter-head">
                    <i class="fa-solid fa-filter mx-2"></i>
                    الفلترة
                </div>
                <div class="card border-0 rounded-0 rounded-bottom bg-dark">
                    {{-- القسم الرئيسي --}}
                    <div class="accordion accordion-flush bg-white " id="accordionFlushExample">
                        <div class="accordion-item bg-white ">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed border-bottom bg-white fw-bold w-100"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1"
                                    aria-expanded="false" aria-controls="flush-collapse1">
                                    القسم الرئيسي
                                </button>
                            </h2>
                            <div id="flush-collapse1" class="accordion-collapse collapse w-100"
                                aria-labelledby="flush-heading1" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body p-0 px-3 bg-white">
                                    @foreach ($categories as $categroy)
                                        <div class="form-check form-check-reverse my-2">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault{{ $categroy->id }}">
                                            <label class="form-check-label" for="flexRadioDefault{{ $categroy->id }}">
                                                {{ $categroy->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- القسم الفرعي --}}
                    <div class="accordion accordion-flush bg-white " id="accordionFlushExample">
                        <div class="accordion-item bg-white ">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed border-bottom bg-white fw-bold w-100"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2"
                                    aria-expanded="false" aria-controls="flush-collapse2">
                                    القسم الفرعي
                                </button>
                            </h2>
                            <div id="flush-collapse2" class="accordion-collapse collapse w-100"
                                aria-labelledby="flush-heading2" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body p-0 px-3 bg-white">
                                    @foreach (range(6, 4) as $count)
                                        <div class="form-check form-check-reverse my-2">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault{{ $count }}">
                                            <label class="form-check-label" for="flexRadioDefault{{ $count }}">
                                                خدمة فرعية
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- خدمات إضافية --}}
                    <div class="accordion accordion-flush bg-white " id="accordionFlushExample">
                        <div class="accordion-item bg-white ">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed border-bottom bg-white fw-bold w-100"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3"
                                    aria-expanded="false" aria-controls="flush-collapse3">
                                    خدمات إضافية
                                </button>
                            </h2>
                            <div id="flush-collapse3" class="accordion-collapse collapse w-100"
                                aria-labelledby="flush-heading3" data-bs-parent="#accordionFlushExample3">
                                <div class="accordion-body p-0 px-3 bg-white">
                                    @foreach (range(9, 7) as $count)
                                        <div class="form-check form-check-reverse my-2">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault{{ $count }}">
                                            <label class="form-check-label" for="flexRadioDefault{{ $count }}">
                                                خدمة إضافية
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- orders card --}}
            <div class="col-12 col-lg-9 pe-0 pe-lg-3">
                <div class="d-flex justify-content-between mt-3 mt-lg-0 mb-2">
                    <div class="dropdown-center w-100">
                        <button class="custom-toggle-dwn btn border-0 rounded-0 rounded-top card bg-white fw-bold w-100"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex justify-content-between w-100">
                                <span>التصنيف</span>
                                <span><i class="fa-solid fa-angle-down"></i></span>
                            </div>
                        </button>
                        <ul class="dropdown-menu border-0 rounded-0 rounded-bottom w-100 text-end">
                            <li><a class="dropdown-item" href="#">الأحدث</a></li>
                            <li><a class="dropdown-item" href="#">الأقدم</a></li>
                        </ul>
                    </div>
                    <div class="dropdown-center chat w-100 mx-3">
                        <button class="custom-toggle-dwn btn border-0 rounded-0 rounded-top card bg-white fw-bold w-100"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex justify-content-between w-100">
                                <span>المدينة</span>
                                <span><i class="fa-solid fa-angle-down"></i></span>
                            </div>
                        </button>
                        <ul class="dropdown-menu border-0 rounded-0 rounded-bottom w-100 text-end">
                            <div class="search-cat w-100 position-relative">
                                <input type="search" name="search" class="p-10 w-100" placeholder="ابحث عن المدينة" />
                            </div>
                            <li><a class="dropdown-item" href="#">الأحدث</a></li>
                            <li><a class="dropdown-item" href="#">الأقدم</a></li>
                        </ul>
                    </div>
                    <div class="dropdown-center chat w-100">
                        <button class="custom-toggle-dwn btn border-0 rounded-0 rounded-top card bg-white fw-bold w-100"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex justify-content-between w-100">
                                <span>الدولة</span>
                                <span><i class="fa-solid fa-angle-down"></i></span>
                            </div>
                        </button>
                        <ul class="dropdown-menu border-0 rounded-0 rounded-bottom w-100 text-end">
                            <div class="search-cat w-100 position-relative">
                                <input type="search" name="search" class="p-10 w-100" placeholder="ابحث عن الدولة" />
                            </div>
                            <li><a class="dropdown-item" href="#">الأحدث</a></li>
                            <li><a class="dropdown-item" href="#">الأقدم</a></li>
                        </ul>
                    </div>
                </div>
                {{-- {{dd($orders)}} --}}
                @foreach ($orders as $order)

                <div class="card bg-white border-0 p-3 w-100 m-0 mb-3">
                    <div class="d-flex  align-items-center ">
                        <div class="d-none d-sm-block ms-4">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp"
                                class="rounded-pill" style="width: 80px; height: 80px; object-fit:cover "
                                alt="Avatar" />
                        </div>
                        <div class="w-100">
                            <div class="d-flex  align-items-start justify-content-between w-100">
                                <h6 class="contact-txt-color-2 fw-bold"><a href="{{route("orders.details",$order->id)}}">{{$order->title}}</a></h6>
                                <div>

                                   <form action="{{Route("orders.addFav",$order->id)}}" method="POST" enctype="multipart/form-data" id="add-fav">
                                    @csrf
                                        <button type="submit" class="btn">
                                            <i class="fa-solid fa-heart favourite-added" ></i>

                                        </button>
                                   </form>


                                </div>
                            </div>

                            <h6 class="text-end m-0 my-2 text-black-50 ">الدولة : {{$order->country->name}} | المدينة: {{$order->city?$order->city->name:'غير محدد'}}</h6>
                            <h6 class="text-end m-0 my-2 short-desc ">
                                {{$order->description}}
                            </h6>
                            <div class="d-flex  align-items-center justify-content-between w-100 flex-wrap ">
                                <div class="col-6 col-md-4 ">
                                    <h6 class="col contact-txt-color-2 fw-bold text-end p-0">السعر المتوقع:
                                        <span class="d-block d-sm-inline m-0"> {{$order->min_price}} -
                                          {{$order->max_price}}  </span>
                                    </h6>
                                </div>
                                <div class="col-6 col-md-4 ">
                                    <h6 class="col contact-txt-color-2 fw-bold text-center "> الكمية:
                                        <span>9</span>
                                        <span> سيارات </span>
                                    </h6>
                                </div>
                                <div class="col-12 col-md-4 ">
                                    <h6 class="col text-center text-md-start m-0 my-2 me-4 text-black-50">تم
                                        النشر
                                        بتوقيت <span class="d-block d-sm-inline">{{$order->created_at}}</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.querySelector('body').classList.add('orderBg3');
    </script>
    <script>
        // let item = document.getElementById("cat-order");
        // window.addEventListener("wheel", function(e) {
        //     if (e.deltaY > 0) item.scrollLeft += 100;
        //     else item.scrollLeft -= 100;
        // });



    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country-dd').on('change', function() {
                var idCountry = this.value;
                $("#city-dd").html('');
                $('.search_select').selectpicker('refresh');
                $.ajax({
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',

                    success: function(result) {
                        $('#city-dd').html(
                            '<option value="" disabled selected>اختر المدينة</option>');
                        $.each(result.cities, function(key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('.search_select select').selectpicker();
                    }
                });
            });

        });
    </script>
       {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>


@endsection
