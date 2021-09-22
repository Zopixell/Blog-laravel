@props(['post'=>$post])
<div class="mb-4">
                    <a href="{{route('users.posts', $post->user)}}"class="font-bold">{{$post->user->name}}</a>

                    <p clas="mb-"> {{$post->body}}</p>


                <!-- Da obrises samo svoje postove-->
                   
                        @can('delete', $post)
                            <form action="{{route('posts.destroy', $post)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500">Delete</button>

                            </form>
                        @endcan
                   

                    <div class="flex items-center">
                        @auth
                        @if (!$post->likedBy(auth()->user())) 
                    <form action="{{route('posts.likes',$post)}}" method="post" class="mr-1">
                        @csrf
                        <button type="submit" class="text-blue-500">Like</button>
                    </form>
                        @else 
                        <form action="{{route('posts.likes',$post)}}" method="post" class="mr-1">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="text-blue-500">Unlike</button>
                    </form>
                    
                    @endif
                  

                    @endauth
                        <span>{{ $post->likes->count() }} {{Str::plural('like', $post->likes->count())}} </span>
                        
                    <div class="bg-gray-100 border-2 min-w-min p-3 rounded-lg">
                    @comments(['model' => $post])
                    </div>
                   
                    </div>
</div>
