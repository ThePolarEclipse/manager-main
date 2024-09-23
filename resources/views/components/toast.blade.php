@props(['msg'])

<div class="toast toast-success show position-fixed z-3 bottom-0 end-0 mb-3 me-3" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <strong class="me-auto">Success</strong>
        <button
            type="button"
            class="ms-2 mb-1 close btn"
            data-dismiss="toast"
            aria-label="Close"
            onclick="dismissToast(event)"
        >
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{ $msg }}
    </div>
</div>
<script>
function dismissToast(event) {
    event.target.closest('.toast').remove();
}
</script>