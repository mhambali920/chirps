@extends('front')
@section('content')

<section role="document" class="relative mt-16 lg:mt-24 overflow-x-hidden">
    @if ($posts->count())
    <div class="container mx-auto px-5 mb-20 sm:mb-32 lg:mb-40 lg:px-10 mt-10">
        <article class="relative bg-white rounded-md">
            <a href="">
                @if ($posts[0]->image)
                <img width="800" height="350" src="{{asset('storage/post-image/'.$posts[0]->image)}}"
                    alt="{{$posts[0]->title}}" decoding="async" loading="lazy" sizes="(max-width: 800px) 100vw, 800px"
                    class="h-full rounded-lg object-cover w-full">
                @else
                <img width="800" height="350" src="{{asset('storage/post-image/default-01.webp')}}"
                    alt="{{$posts[0]->title}}" decoding="async" loading="lazy" sizes="(max-width: 800px) 100vw, 800px"
                    class="lg:h-[500px] rounded-lg object-cover w-full">
                @endif

            </a>
            <div
                class="absolute left-0 right-0 bottom-0 lg:px-16 lg:py-0 bg-gradient-black rounded-lg p-5 transform translate-y-20">
                <div class="bg-white w-full p-5 rounded-lg shadow-lg">
                    <ul class="flex text-xt sm:text-sm text-blue-800 font-medium mb-2 -mx-1">
                        <li class="px-1"><a href="">Berita</a></li>
                    </ul>
                    <h2 class="text-sm sm:text-xl lg:text-4xl font-bold mb-2 text-gray-600"><a
                            href="{{ url('post/'.$posts[0]->slug ) }}"
                            class="uppercase hover:text-gray-500">{{$posts[0]->title}}</a></h2>
                    <div class="mb-2 text-xs text-gray-300 items-center -mx-2 sm:text-sm"><span
                            class="block md:inline-block px-2">Oleh
                            <a href="#" class="inline-block"><span
                                    class="text-gray-500 hover:text-gray-500 font-medium capitalize">{{$posts[0]->user->name}}</span></a></span>
                        <time
                            class="block md:inline-block px-2 md:float-right">{{\Carbon\Carbon::parse($posts[0]->published_at)->format('d
                            M Y') }}</time>
                    </div>
                </div>
            </div>
        </article>
    </div>

    <div class="container mx-auto px-5 mb-20 sm:mb-32 lg:px-10">
        <div class="flex items-end justify-between font-medium mb-10">
            <div class="block"><span class="uppercase text-blue-800 text-sm">Artikel</span>
                <h2 class="font-bold text-2xl text-gray-600 md:text-3xl">Pilihan</h2>
            </div> <a href="#"
                class="text-white text-xt sm:text-sm bg-blue-800 rounded-full py-1 px-3 sm:py-2 sm:px-6 transition-all duration-200 hover:bg-blue-dark hover:text-white hover:shadow-xl mb-2">Lainnya<i
                    class="ml-2 fas fa-arrow-right"></i></a>
        </div>
        <div class="transition-all ease-in-out -mx-2 lg:mx-0 grid grid-cols-2 gap-2 lg:grid-cols-3 lg:gap-10">
            @foreach ($posts->skip(1) as $post)
            <div class="post px-2 whitespace-normal mb-3 lg:mb-0 lg:px-0">
                <article
                    class="transition-all duration-200 transform lg:hover:-translate-y-2 bg-white shadow-lg rounded-md thumbnail">
                    <a href="{{ url('post/'.$post->slug ) }}">
                        @if ($post->image)
                        <img width="373" height="163" src="{{asset('storage/post-image/'.$post->image)}}" alt=""
                            decoding="async" loading="lazy" sizes="(max-width: 373px) 100vw, 373px"
                            class="object-cover w-full h-24 lg:h-40 rounded-lg md:mb-2">

                        @else
                        <img width="373" height="163" src="{{asset('storage/post-image/default-01.webp')}}" alt=""
                            decoding="async" loading="lazy" sizes="(max-width: 373px) 100vw, 373px"
                            class="object-cover w-full h-24 lg:h-40 rounded-lg md:mb-2">
                        @endif
                    </a>
                    <div class="px-3 py-2 overflow-x-hidden">
                        <div class="flex justify-between items-center mb-2">
                            <ul class="flex text-xs text-blue-800 font-medium -mx-1">
                                <li class="px-1"><a href="">{{$post->category->name}}</a></li>
                            </ul>
                        </div>
                        <div class="flex justify-between items-start">
                            <h2
                                class="entry-title text-sm lg:text-lg font-bold lg:font-medium mb-2 overflow-hidden h-10 lg:h-14">
                                <a href="{{ url('post/'.$post->slug ) }}"
                                    class="hover:text-gray-500 text-gray-600">{{$post->title}}</a>
                            </h2>
                        </div>
                        <div class="mb-2 text-xs text-gray-300 items-center -mx-2 ">
                            <span class="block md:inline-block px-2">Oleh
                                <a href="" class="inline-block">
                                    <span
                                        class="text-gray-500 hover:text-gray-500 font-medium capitalize">{{$post->user->name}}</span>
                                </a>
                            </span>
                            <time
                                class="block md:inline-block px-2 md:float-right">{{\Carbon\Carbon::parse($post->published_at)->format('d
                                M Y') }}
                            </time>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach


        </div>
    </div>

    @else
    <p class="text-center fs-4">No post found.</p>
    @endif
</section>

@endsection