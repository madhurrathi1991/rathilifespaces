<!--<div class="chat__buttons" data-aos="fade-in">
	  <div class="chat__bot d-flex align-items-center justify-content-center">
	  <img class="transition" src="<?= base_url() ?>assets/images/whatsappbubble-icon.png" alt="WhatsApp">
	</div>
</div>-->

<script src="<?= base_url() ?>assets/js/combine53cf.js?ver=2.1"></script>
<script src="<?= base_url() ?>assets/js/custom-min4b1d.js?ver=1.8"></script>
<script> 
function offsetAnchor() {
  if (location.hash.length !== 0) {
	window.scrollTo(window.scrollX, window.scrollY - 90);
  }
}
window.setTimeout(offsetAnchor, 0);
</script>
<script>
	$('.nav-tabs').scrollingTabs({
	  scrollToTabEdge: false,
	  enableSwiping: true,
	  disableScrollArrowsOnFullyScrolled: true, 
	});


	$(document).ready(function(){
		AOS.init({
			duration: 1000,
			offset: 0,
			startEvent: 'DOMContentLoaded',
			once: true,
		});
	});
</script>