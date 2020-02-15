@extends(Auth::check() ? 'layouts.front' : 'label.layouts.label-layouts')

@push('styles')
    <style>
        .no-services{
            border: 1px solid #f7d8dd;
            background-color: #fbeeed;
            color: #d9534f;
            padding: 20px 0;
        }
    </style>
@endpush

@section('content')

    @if(auth::check())
        @include('label.old-page')
    @else   
        @include('label.new-page')
    @endif

@endsection

@push('footer-script')
    <script>
        $(function() {
            // change services as per catergory selected
            $('body').on('click', '.categories-list', (function() {
                let id = $(this).data('category-id');
                if(id){
                    $('.services-list').hide();
                    $('.service-category-'+id).fadeIn();
                }
                else{
                    $('.services-list').fadeIn();
                }

                $('html, body').animate({
                    scrollTop: $(".listings").offset().top
                }, 1000);
            }));

            $('body').on('change', '#country', (function() {

                let id = $('#country').val();
                console.log(id);
                if(id != 'All Locations'){
                    $('.services-list').hide();
                    $('.location-'+id).fadeIn();
                }
                else{
                    $('.services-list').fadeIn();
                }

            }));

            if (localStorage.getItem('location') !== '') {
                var url = '{{ route('front.index', ['location' => 'variable']) }}';
                url = url.replace('variable', localStorage.getItem('location'));

                $.easyAjax({
                    url: url,
                    type: 'GET',
                    success: function (response) {
                        var categories = `
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 mb-30 categories-list">
                            <div class="ctg-item" style="background: var(--primary-color)">
                                <a href="javascript:;">
                                    <div class="icon-box">
                                        <i class="flaticon-fork"></i>
                                    </div>
                                    <div class="content-box">
                                        <h5 class="mb-0">
                                            @lang('front.all')
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>`;

                        response.categories.forEach(category => {
                            if (category.services.length > 0) {
                                var url = category.category_image_url;

                                categories += `
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 mb-30 categories-list" data-category-id="${category.id}">
                                    <div class="ctg-item" style="background-image:url('${url}')">
                                        <a href="javascript:;">
                                            <div class="icon-box">
                                                <i class="flaticon-fork"></i>
                                            </div>
                                            <div class="content-box">
                                                <h5 class="mb-0">
                                                    ${category.name}
                                                </h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>`
                            }
                        });
                        $('#categories').html(categories);

                        var services = '';

                        if (response.services.length > 0) {
                            response.services.forEach(service => {
                                services += `
                                    <div class="col-lg-3 col-md-6 col-12 mb-30 services-list service-category-${service.category_id}">
                                        <div class="listing-item">
                                            <div class="img-holder" style="background-image: url('${ service.service_image_url }')">
                                                <div class="category-name">
                                                    <i class="flaticon-fork mr-1"></i>${service.category.name}
                                                </div>
                                                <div class="time-remaining">
                                                    <i class="fa fa-clock-o mr-2"></i>
                                                    <span>${service.time} ${makeSingular(service.time, service.time_type)}</span>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <h5 class="mb-2">
                                                    <a href="${service.service_detail_url}">${service.name}</a>
                                                </h5>
                                               
                                                <ul class="ctg-info centering h-center v-center">
                                                    <li class="mt-1">
                                                        <div class="service-price">
                                                            <span class="unit">{{ $settings->currency->currency_symbol }}</span>${service.discounted_price}
                                                        </div>
                                                    </li>
                                                    <li class="mt-1">
                                                        <div class="dropdown add-items">
                                                            <a href="javascript:;" class="btn-custom btn-blue dropdown-toggle add-to-cart"
                                                        data-service-price="${service.discounted_price}"
                                                        data-service-id="${service.id}"
                                                        data-service-name="${service.name}"
                                                        aria-expanded="false">
                                                                @lang('app.add')
                                                                <span class="fa fa-plus"></span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>`
                            });

                        services += `
                            <div class="col-12 text-right">
                                <a href="javascript:;" onclick="goToPage('GET', '{{ route('front.bookingPage') }}')" class="btn btn-custom">
                                    @lang('front.selectBookingTime')
                                    <i class="fa fa-angle-right ml-1"></i>
                                </a>
                            </div>`;
                        }
                        else {
                            services += `
                            <div class="col-12 text-center mb-5">
                                <h3 class="no-services">
                                    <i class="fa fa-exclamation-triangle"></i> @lang('front.noSearchRecordFound')
                                </h3>
                            </div>
                            `
                        }

                        $('#services').html(services);
                    }
                })
            }
        })
    </script>
    <script>
        // add items to cart
        $('body').on('click', '.add-to-cart', function () {
            let serviceId = $(this).data('service-id');
            let servicePrice = $(this).data('service-price');
            let serviceName = $(this).data('service-name');
            let businessId = $(this).data('business-id');
            console.log(businessId);
            var data = {serviceId, servicePrice, serviceName,businessId, '_token': $("meta[name='csrf-token']").attr('content')};
            
            $.easyAjax({
                url: '{{ route('front.addOrUpdateProduct') }}',
                type: 'POST',
                data: data,
                success: function (response) {
                    $('.cart-badge').text(response.productsCount);
                    console.log(response);
                    goToPage('GET', '{{ route('front.bookingPage') }}');
                }
            })
        });

    </script>
@endpush
