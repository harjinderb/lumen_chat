{!! HTML::script('js/popper.min.js') !!}
{!! HTML::script('js/TweenMax.min.js') !!}
{!! HTML::script('js/ScrollMagic.js') !!}
{!! HTML::script('js/animation.gsap.js') !!}

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});


			// Fixed Nav

			var fixedNav = $('.content-wrap').offset();

			var $window = $(window);

			$window.scroll(function() {
				if ( $window.scrollTop() >= fixedNav.top) {
					$(".header").addClass("fixed-header");

				}

				if ( $window.scrollTop() <= fixedNav.top) {
					$(".header").removeClass("fixed-header");

				}


			});
</script>
<script>
	var controller = new ScrollMagic.Controller();



	var heroimg = TweenMax.staggerFromTo(".hero-img", .5, {top: 50, opacity: 0}, {delay: 0.3, top: 0, opacity: 1, ease: Linear.easeOut});
	               var scene = new ScrollMagic.Scene({triggerElement: ".hero-content", offset: 10})
	             .setTween(heroimg)
	             .addTo(controller);

		var featureimg1 = TweenMax.staggerFromTo(".feature1 .half-sec-img", .5, {left: -100, opacity: 0}, {delay: 0.1, left: 0, opacity: 1, ease: Linear.easeOut});
	               var scene = new ScrollMagic.Scene({triggerElement: ".feature1", offset: -100})
	             .setTween(featureimg1)
	             .addTo(controller);



		$('.feature-box').each(function(){

			var tween = TweenMax.from($(this), 0.5, {left: -100, opacity: 0}, {delay: 1, left: 0, opacity: 1, ease: Linear.easeOut});
			var scene = new ScrollMagic.Scene({triggerElement: this, offset: -300})
			.setTween(tween)
			.addTo(controller);
		});

		var featureimg2 = TweenMax.staggerFromTo(".img-one-third img", .3, {left: 100, opacity: 0}, {delay: 0.1, left: 0, opacity: 1, ease: Linear.easeOut});
	               var scene = new ScrollMagic.Scene({triggerElement: ".feature2", offset: -100})
	             .setTween(featureimg2)
	             .addTo(controller);


	var featureimg4 = TweenMax.staggerFromTo(".feature4 .half-sec-img", .5, {left: -100, opacity: 0}, {delay: 0.1, left: 0, opacity: 1, ease: Linear.easeOut});
	               var scene = new ScrollMagic.Scene({triggerElement: ".feature4", offset: -100})
	             .setTween(featureimg4)
	             .addTo(controller);

	var featurebtn4 = TweenMax.staggerFromTo(".feature4 .btn", .3, {left: 100, opacity: 0}, {delay: 0.1, left: 0, opacity: 1, ease: Linear.easeOut});
	               var scene = new ScrollMagic.Scene({triggerElement: ".feature4", offset: -100})
	             .setTween(featurebtn4)
	             .addTo(controller);


		var priceplan1 = TweenMax.staggerFromTo(".priceplan1", .4, {left:-200, opacity: 0}, {delay: 0.1, left: 0, opacity: 1, ease: Linear.easeOut});
	               var scene = new ScrollMagic.Scene({triggerElement: ".pricing-wrap", offset: -50})
	             .setTween(priceplan1)
	             .addTo(controller);



		var priceplan3 = TweenMax.staggerFromTo(".priceplan3", .4, {left: 200, opacity: 0}, {delay: 0.1, left: 0, opacity: 1, ease: Linear.easeOut});
	               var scene = new ScrollMagic.Scene({triggerElement: ".pricing-wrap", offset: -50})
	             .setTween(priceplan1)
	             .addTo(controller);


	            var featurenimg2 = TweenMax.staggerFromTo(".featuren2 .half-sec-img", .5, {left: 100, opacity: 0}, {delay: 0.1, left: 0, opacity: 1, ease: Linear.easeOut});
	               var scene = new ScrollMagic.Scene({triggerElement: ".featuren2", offset: -200})
	             .setTween(featurenimg2)
	             .addTo(controller);

		var featurenimg3 = TweenMax.staggerFromTo(".featuren3 .half-sec-img", .5, {left: -100, opacity: 0}, {delay: 0.1, left: 0, opacity: 1, ease: Linear.easeOut});
	               var scene = new ScrollMagic.Scene({triggerElement: ".featuren3", offset: -200})
	             .setTween(featurenimg3)
	             .addTo(controller);

		var featureimg4 = TweenMax.staggerFromTo(".featuren4 .half-sec-img", .5, {left: -100, opacity: 0}, {delay: 0.1, left: 0, opacity: 1, ease: Linear.easeOut});
	               var scene = new ScrollMagic.Scene({triggerElement: ".featuren4", offset: -200})
	             .setTween(featureimg4)
	             .addTo(controller);

		var featurenimg5 = TweenMax.staggerFromTo(".featuren5 .half-sec-img", .5, {left: 100, opacity: 0}, {delay: 0.1, left: 0, opacity: 1, ease: Linear.easeOut});
	               var scene = new ScrollMagic.Scene({triggerElement: ".featuren5", offset: -200})
	             .setTween(featurenimg5)
	             .addTo(controller);

		var featurenimg6 = TweenMax.staggerFromTo(".featuren6 .half-sec-img", .5, {left: -100, opacity: 0}, {delay: 0.1, left: 0, opacity: 1, ease: Linear.easeOut});
	               var scene = new ScrollMagic.Scene({triggerElement: ".featuren6", offset: -200})
	             .setTween(featurenimg6)
	             .addTo(controller);
</script>