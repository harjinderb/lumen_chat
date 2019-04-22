@extends('UI')

@section('title')
{{$page_title}}
@stop

@section('metainfo')
<meta content="" name="description" />
<meta content="" name="keywords" />
@stop



@section('content')
<div class="content-wrap">
	<section class="pt-50 pb-50">
		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<h1 class="text-center text-uppercase">our best pricing</h1>
					<p class="font-18 text-grey text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. </p>
				</div>
			</div>
			<div class="pricing-wrap ">
				<div class="row">
					@foreach($planData as $key => $plan)
					<div class="col-md-4">
						<div class="single-price bg-light-grey priceplan{{$key +1}} @if(isset($plan['popular']) && $plan['popular'] == 'on') seledted-plan @endif ">
							<div class="pricing-header">
								<div class="price-icon">
									<i class="fas fa-tags"></i>
								</div>
								<h2>{{ $plan['name'] }}</h2>
							</div>
							<div class="price-info">
								<h3>
									{{ $plan['currency'] }}<span>{{ $plan['price'] }}</span>/Month
								</h3>
							</div>
							<ul class="plan-feature" id="{{ $plan['id'] }}">
								<li><span class="plan-feature-ico color-theme"><i class="far fa-check-square"></i></span>
									  {{ $plan['trial_days'] }} days trial period</li>
								@foreach($features as $feature)
								<li>
									<span class="plan-feature-ico text-grey {{$feature['_id']}}"><i class="far fa-window-close"></i></span>
									 {{$feature['feature']}}
								</li>
								@endforeach

								@foreach($plan['features'] as $featureId)
				                    <script type="text/javascript">
				                    	$('ul#{{$featureId['plan_id'] }} li > span.{{$featureId['feature_id'] }}').removeClass('text-grey').addClass('color-theme');
				                    	$('ul#{{$featureId['plan_id'] }} li > span.{{$featureId['feature_id'] }} > i').removeClass('fa-window-close').addClass('fa-check-square');
				                    </script>
				                @endforeach
							</ul>
							<div class="buy-plan-btn">
								<a href="javascript:void(0)" class="btn btn-primary text-uppercase"> Get it Now</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
</div>
@endsection


@section('moreJS')

@stop
