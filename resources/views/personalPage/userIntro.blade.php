@if($object->user->coverImage)
    <img style="height:25rem;width: 100%;object-fit: cover;" src="{{ $object->user->coverImage }}"
         alt="Responsive image">
@else
    <img style="height:25rem;width: 100%;object-fit: cover;"
         src="https://images6.alphacoders.com/786/thumb-1920-786829.jpg" alt="Responsive image">
@endif
@if($object->user->id != Auth::user()->id)
    <div class="row w-75 mt-2 justify-content-end" style="height:3rem;margin:0 auto;">
        @if($object->isTrack)
            <button id="trackButton" class="btn btn-outline-danger"
                    onclick='toggleTrack({{ Auth::user()->id }},{{ $object->user->id }})'>已追蹤
            </button>
        @else
            <button id="trackButton" class="btn btn-danger"
                    onclick='toggleTrack({{ Auth::user()->id }},{{ $object->user->id }})'>追蹤
            </button>
        @endif
    </div>
@endif
<div class="row w-75 mt-2 shadow " style="height:20rem;margin:0 auto;">
    <div class="col-3 align-self-center">
        @if($object->user->personImage)
            <img style="height:15rem;width: 15rem; object-fit: cover;"
                 class="text-center rounded-circle mt-2 mb-2"
                 src="{{$object->user->personImage . "?" . random_int(0,1000)}}"
                 alt="Card image cap">
        @else
            <img style="height:15rem;width: 15rem; object-fit: cover;"
                 class="text-center rounded-circle mt-2 mb-2"
                 src="https://images6.alphacoders.com/786/thumb-1920-786829.jpg"
                 alt="Card image cap">
        @endif
    </div>
    <div class="col-6" style="height:20rem;">
        <h2 class="mt-3">{{$object->user->name}}</h2>
        <hr class=""/>

        <div class="d-flex justify-content-start">
            {{--                    <div class="">qq</div>--}}
            {{--                    <div class="">基隆人</div>--}}
        </div>
        <div style="word-wrap:break-word; word-break:normal ;overflow:hidden; height: 65%;
text-overflow:ellipsis">
            <strong>
                <h3>
                    {{$object->user->introduction}}

                </h3>

            </strong>
        </div>
    </div>
    <div class="col-3 p-3">
        <div class="row ">
            <div class="col">
                <h5 class="text-center">
                    <strong>
                        音樂
                    </strong>
                </h5>
                <div class="text-center">
                    <h2>
                        <strong>
                            {{ $object->musicQuantity }}
                        </strong>

                    </h2>
                </div>
            </div>
            <div class="col">
                <h5 class="text-center">
                    <strong>
                        粉絲
                    </strong>
                </h5>
                <div class="text-center">
                    <h2>
                        <strong id="fansQuantity">
                            {{ $object->fansQuantity }}
                        </strong>

                    </h2>
                </div>
            </div>
            <div class="col">
                <h5 class="text-center">
                    <strong>
                        追蹤中
                    </strong>
                </h5>
                <div class="text-center">
                    <h2>
                        <strong>
                            {{ $object->trackQuantity }}
                        </strong>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
