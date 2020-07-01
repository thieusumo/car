@if(session()->has("error"))
    <div class="alert alert-danger message-errors my-0" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        {{ session("error") }}
    </div>
@endif

@if(session()->has("error_login"))
    <div class="alert alert-danger message-errors my-0" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        {{ session("error_login") }}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger message-errors my-0">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <ul style="padding-left: 0; list-style: none;">
            @foreach ($errors->toArray() as $key => $error)
                @if($key != 'is_modal')
                    @foreach($error as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                    
                @endif
            @endforeach
        </ul>
    </div>
@endif