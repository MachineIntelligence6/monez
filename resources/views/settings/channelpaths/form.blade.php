@section('css')
<!-- Plugins css -->
<link href="{{asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
<div>

    <div class="row justify-content-between">
        <div class="col-auto">
            <h5 class="mb-3 text-uppercase">Channel Info</h5>
        </div>

        <div class="col-auto">
            @if($lastSegment=='create')

            @elseif($lastSegment=='edit')
            <button class="btn btn-primary" type="submit"><span class="fas fa-check mr-1"></span>
                Save Info
            </button>
            @else
            <a href="{{route('channelpaths.edit',['channelpath'=>$channelpath->id])}}" class="btn btn-secondary">
                <span class="fas fa-edit mr-1"></span>
                Edit Info
            </a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="channel name" class="form-label">Channel Name</label><label class="text-danger">*</label>
                <div class="input-group input-group-merge">
                    <input type="text" class="form-control" @if($condition==$lastSegment) disabled @endif id="channelname" name="channel_name" value="{{old('channel_name', $channelpath->channel_name ?? '')}}" data-check-unique="oninput" data-invalid-message=""  placeholder="Enter Channel Name" required />
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        You must enter valid input
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="channelPath" class="form-label">Channel Path</label><label class="text-danger">*</label>
                <input type="url" class="form-control" @if($condition==$lastSegment) disabled @endif id="channelpath" value="{{old('channel_path', $channelpath->channel_path ?? '')}}" name="channel_path" placeholder="Enter Channel Path" required pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">
                    You must enter valid path
                </div>
            </div>
        </div> <!-- end col -->
        
    </div> <!-- end row -->

    @if($lastSegment=='create')
    <div class="row pl-2">

        <button class="btn btn-primary col-auto" type="submit">Add ChannelPath</button>

        <a href="{{ route('channelpaths.index') }}" class="btn btn-secondary ml-1">Cancel</a>
    </div>

    @endif

</div>





@section('script')
<!-- Plugins js-->
<script src="{{asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>
<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>


<!-- Page js-->
<script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>
<script src="{{asset('assets/js/modal-init.js')}}"></script>

<script>
   

</script>

@endsection