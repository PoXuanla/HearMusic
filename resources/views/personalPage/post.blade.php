<div class=" pt-3 pb-3" style="width: 60%;">
    @if($object->posts)
        @foreach($object->posts as $post)
            <div class="mt-1 mb-5 pb-2 pt-1 rounded shadow border ">
                <div class="row align-items-center">
                    <div class="col-2">
                        <a href="{{ route('personalPage',['account' => $object->user->account]) }}"
                           class="btn pr-0">
                            @if($object->user->personImage)
                                <img class="rounded"
                                     style="width: 3rem;height: 3rem;"
                                     src="{{$object->user->personImage ."?" . time()}}"
                                     alt="">
                            @else
                                <img class="rounded"
                                     style="width: 3rem;height: 3rem;"
                                     src="https://images6.alphacoders.com/786/thumb-1920-786829.jpg"
                                     alt="">
                            @endif

                        </a>
                    </div>
                    <div class="col-9 pt-1 justify-content-between" style="text-align: left;">
                        <div class="row">
                            <strong>
                                {{ $post->title }}
                            </strong>
                        </div>
                        <div class="row" style="color: #545b62;">
                            {{ $post->time }}
                        </div>
                    </div>
                </div>
                <div class="row mb-3 mt-3 ml-3 mr-3 align-items-center rounded border"
                     style="height:6rem;background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);">
                    <div class="col-3">

                        <img class="rounded"
                             style="height:5rem;width: 5rem;"
                             src=
                             @if($post->music->image)
                                 "{{ $post->music->image . "?" . time() }}"
                        @else
                            "{{ url('storage/musicImg/error.png')  }}"
                        @endif
                        alt="">
                    </div>
                    <div class="col-6">
                        <div class="row" style="color:white;">
                            <h4>
                                {{ $post->music->name }}
                            </h4>
                        </div>
                        <!-- author -->
                        {{--                            <div class="row" style="color:white;">{{ $post->music->id }}</div>--}}

                    </div>
                    <div class="col-3">
                        <button class="btn btn-danger playMusic" data-id="{{$post->music->id}}">
                            <i class="fas fa-play-circle"></i>
                        </button>
                    </div>
                </div>
                <div class="row mr-0 ml-0">
                    <div class="col">
                        <div class="btn btn-outline-danger"><i class="far fa-heart"></i></div>
                        <div class="btn btn-outline-danger"><i class="far fa-comment-dots"></i></div>
                        @if($object->user->id == Auth::user()->id)
                            <div class="btn btn-outline-danger float-right"><i class="far fa-trash-alt"></i></div>
                        @endif
                    </div>
                </div>
                <hr/>
                <div class="comment">
                @if($post->comment)
                    @foreach($post->comment as $message)
                        @if($loop->index == 3)
                                <div class="row">
                                    <div class="col text-center">
                                        <a href="">查看所有留言..</a>
                                    </div>
                                </div>
                            @break
                            @endif
                        <div class="row">
                            <div class="col-1 ml-3">
                                <img class="rounded" src="{{ $message->personImage . "?"  . time() }}" alt=""
                                     style="width: 2rem;height: 2rem;">
                            </div>
                            <div class="col-2">
                                <p>{{$message->name}} :</p>
                            </div>
                            <div class="col">
                                <p>{{ $message->content }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row ">
                <div class="col-1 ml-3">
                    {{--                                <span class="input-group-text justify-content-center ">{{ $object->user->name }}</span>--}}
                    <img class="rounded" src="{{ Auth::user()->personImage . "?"  . time() }}" alt=""
                         style="width: 2rem;height: 2rem;">
                </div>
                <div class="col mr-3">
                    <input type="hidden" value="{{ $post->id }}">
                    <input type="hidden" value="{{Auth::user()->id}}">
                    <input class="form-control message" type="text" placeholder="輸入留言..."></div>
            </div>
</div>
@endforeach
@else
    <div class="mt-1 mb-2 pb-2 pt-1 rounded shadow">
        尚無任何動態
    </div>
    @endif
    </div>
