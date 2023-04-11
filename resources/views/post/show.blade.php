@extends('front')
@section('content')
<div class="container mx-auto flex flex-wrap py-6">
    <!-- Post Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->

            @if ($post->image)
            <img src="{{asset('storage/post-image/'.$post->image)}}" alt="{{$post->title}}"
                class="rounded-lg hover:opacity-75">
            @else
            <img src="{{asset('storage/post-image/default.jpg')}}" alt="{{$post->title}}"
                class="rounded-lg hover:opacity-75">
            @endif

            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$post->category->name}}</a>
                <h1 class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->title}}</h1>
                <p class="text-sm pb-8">
                    <span class="font-semibold hover:text-gray-800">{{$post->user->name}}</span>,
                    {{\Carbon\Carbon::parse($post->published_at)->format('d M Y') }}
                </p>
                <div>{{ $post->body }}</div>
            </div>
        </article>

        <div class="w-full pt-6">
            @if ($prevSlug)
            <a href="{{ url('post/'.$prevSlug->slug) }}"
                class="float-left w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i>
                    Previous</p>
                <p class="pt-2">{{$prevSlug->title}}</p>
            </a>
            @endif

            @if ($nextSlug)
            <a href="{{ url('post/'.$nextSlug->slug) }}"
                class="float-right w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i
                        class="fas fa-arrow-right pl-1"></i></p>
                <p class="pt-2">{{$nextSlug->title}}</p>
            </a>
            @endif

        </div>

        <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6">
            <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                <img src="https://source.unsplash.com/collection/1346951/150x150?sig=1"
                    class="rounded-full shadow h-32 w-32" />
            </div>
            <div class="flex-1 flex flex-col justify-center md:justify-start">
                <p class="font-semibold text-2xl">David</p>
                <p class="pt-2">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel neque non libero suscipit
                    suscipit eu eu urna.
                </p>
                <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                    <a class="" href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">About Us</p>
            <p class="pb-2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique.
                Vestibulum ut finibus
                leo. In hac habitasse platea dictumst.
            </p>
            <a href="#"
                class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                Get to know us
            </a>
        </div>

        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">Instagram</p>
            <div class="grid grid-cols-3 gap-3">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1" />
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2" />
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3" />
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=4" />
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=5" />
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=6" />
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=7" />
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=8" />
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=9" />
            </div>
            <a href="#"
                class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                <i class="fab fa-instagram mr-2"></i> Follow @dgrzyb
            </a>
        </div>
    </aside>
</div>
<aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">
    <div class="px-4 mx-auto max-w-screen-xl">
        <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Related articles</h2>
        <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
            <article class="max-w-xs">
                <a href="#">
                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-1.png"
                        class="mb-5 rounded-lg" alt="Image 1">
                </a>
                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                    <a href="#">Our first office</a>
                </h2>
                <p class="mb-4 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone
                    many changes! After months of preparation.</p>
                <a href="#"
                    class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                    Read in 2 minutes
                </a>
            </article>
            <article class="max-w-xs">
                <a href="#">
                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-2.png"
                        class="mb-5 rounded-lg" alt="Image 2">
                </a>
                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                    <a href="#">Enterprise design tips</a>
                </h2>
                <p class="mb-4 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone
                    many changes! After months of preparation.</p>
                <a href="#"
                    class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                    Read in 12 minutes
                </a>
            </article>
            <article class="max-w-xs">
                <a href="#">
                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-3.png"
                        class="mb-5 rounded-lg" alt="Image 3">
                </a>
                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                    <a href="#">We partnered with Google</a>
                </h2>
                <p class="mb-4 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone
                    many changes! After months of preparation.</p>
                <a href="#"
                    class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                    Read in 8 minutes
                </a>
            </article>
            <article class="max-w-xs">
                <a href="#">
                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-4.png"
                        class="mb-5 rounded-lg" alt="Image 4">
                </a>
                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                    <a href="#">Our first project with React</a>
                </h2>
                <p class="mb-4 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone
                    many changes! After months of preparation.</p>
                <a href="#"
                    class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                    Read in 4 minutes
                </a>
            </article>
        </div>
    </div>
</aside>
@endsection