<div class="toast-container position-absolute p-3" style="right: 0;">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
          <div class="toast align-items-center text-white bg-{{ $msg }} border-0" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="d-flex">
                  <div class="toast-body">
                      {{ Session::get('alert-' . $msg) }}
                  </div>
                  <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
          </div>
      @endif
  @endforeach
</div>