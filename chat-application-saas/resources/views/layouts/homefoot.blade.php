{!! HTML::script('assets/front/js/application-home.js') !!}
{!! HTML::script('assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js') !!}
{!! HTML::script('assets/front/plugins/boostrapv3/js/bootstrap.min.js') !!}

{!! HTML::script('assets/front/plugins/owl-carousel/owl.carousel.min.js') !!}
{!! HTML::script('assets/front/plugins/parrallax/js/jquery.parallax-1.1.3.js') !!}
{!! HTML::script('assets/front/plugins/jquery-nicescroll/jquery.nicescroll.min.js') !!}
{!! HTML::script('assets/front/plugins/jquery-appear/jquery.appear.js') !!}

{!! HTML::script('assets/plugins/bootstrap-select2/select2.min.js') !!}
<!-- END CORE JS FRAMEWORK -->

<!-- BEGIN PAGE LEVEL JS -->
{!! HTML::script('assets/front/plugins/pace/pace.min.js') !!}
{!! HTML::script('assets/front/plugins/jquery-numberAnimate/jquery.animateNumbers.js') !!}
{!! HTML::script('assets/js/prefixfree.min.js') !!}
{!! HTML::script('assets/plugins/breakpoints.js') !!}
{!! HTML::script('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') !!}
{!! HTML::script('assets/plugins/jquery-validation/js/jquery.validate.min.js') !!}
{!! HTML::script('assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js') !!}
{!! HTML::script('assets/plugins/dropzone/dropzone.min.js') !!}
{!! HTML::script('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') !!}
{!! HTML::script('assets/plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js') !!}   
{!! HTML::script('assets/plugins/jquery-inputmask/jquery.inputmask.min.js') !!}
{!! HTML::script('assets/plugins/jquery-autonumeric/autoNumeric.js') !!}
{!! HTML::script('assets/front/plugins/jquery-unveil/jquery.unveil.min.js') !!}
{!! HTML::script('assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') !!}
{!! HTML::script('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') !!}
<!-- END PAGE LEVEL PLUGINS -->

<!-- PAGE JS -->
{!! HTML::script('assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js') !!}
{!! HTML::script('assets/plugins/ios-switch/ios7-switch.js') !!}

{!! HTML::script('assets/front/js/core.js') !!}
{!! HTML::script('assets/js/core.js') !!}
{!! HTML::script('assets/js/demo.js') !!}

{!! HTML::script('assets/js/form_validations.js') !!}
{!! HTML::script('assets/js/form_elements.js') !!}
<!-- END JS PLUGIN --> 

<script>

	$("a[href='#myModal']").attr({
	"data-toggle":"modal", 
	"data-target":"#myModal"
	});

	$(".hoverimg img")
	.mouseover(function() { 
	  var src = $(this).attr("src").replace(".png", "-hover.png");
	  $(this).attr("src", src).fadeIn("fast");
	})
	.mouseout(function() {
	  var src = $(this).attr("src").replace("-hover.png", ".png");                
	  $(this).attr("src", src).fadeIn("fast");
	});

</script>
