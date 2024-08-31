<!-- <div id="modal_form" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false"> -->
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="event.preventDefault(); closeModal();"></button>
				<h4 class="modal-title">
					@yield('title')
				</h4>
			</div>
			<div class="modal-body">
				@yield('content')
			</div>
		</div>
	</div>
<!-- </div> -->
<script src="{{ asset('assets/custom/scripts/master/j_workflow.js') }}" type="text/javascript"></script>

<script>
App.init();
function closeModal() {
    $('#modal_form').modal('hide');
}
</script>