@extends('front')
@section('content')

<section role="document" class="relative mt-16 lg:mt-24 overflow-x-hidden">
    <div class="container relative items-center mx-auto mb-10 mt-10 lg:mt-16 px-5 lg:px-10">
        <div class="bg-white text-sm block lg:w-2/3 mx-auto">
            <div class="bg-blue-200 absolute transform -translate-x-full w-full h-10 block"></div>
            <ul
                class="inline-flex items-center bg-blue-200 -mx-2 pr-5 h-10 text-blue-800 rounded-tr-full rounded-br-full">
                <li class="px-2"><a href="/" rel="nofollow">Home</a></li>
                <li class="px-2 text-xt"><i class="fas fa-chevron-right"></i></li>
                <li class="px-2 whitespace-nowrap"><a href="">{{$post->category->name}}</a></li>
                <li class="px-2 text-xt"><i class="fas fa-chevron-right"></i></li>
                <li class="px-2 font-medium w-64 md:w-auto whitespace-nowrap overflow-x-hidden">{{$post->title}}
                </li>
            </ul>
        </div>
    </div>
    <div id="content" class="container mx-auto px-5 mb-20 sm:mb-24 lg:px-10 text-gray-600">
        <div class="block lg:w-2/3 mx-auto">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold leading-snug mb-5 ">{{$post->title}}</h1>
            <div class="mb-10 text-xs text-gray-300 items-center -mx-2 md:text-base"><span
                    class="block md:inline-block px-2">Oleh
                    <a href="#" class="inline-block"><span
                            class="text-gray-500 hover:text-gray-500 font-medium capitalize">{{$post->user->name}}</span></a></span>
                <time id="postDate"
                    class="block md:inline-block px-2 md:float-right">{{\Carbon\Carbon::parse($post->published_at)->format('d
                    M Y') }}</time>
            </div>

            @if ($post->image)
            <img width="800" height="350" src="{{asset('storage/post-image/'.$post->image)}}" alt="{{$post->title}}"
                decoding="async" sizes="(max-width: 800px) 100vw, 800px" class="mb-10 rounded-lg w-full wp-post-image">
            @else
            <img width="800" height="350" src="{{asset('storage/post-image/default-01.webp')}}" alt="{{$post->title}}"
                decoding="async" sizes="(max-width: 800px) 100vw, 800px" class="mb-10 rounded-lg w-full wp-post-image">
            @endif

            <div class="content leading-relaxed mb-10 font-sans text-lg md:text-xl">
                {{$post->body}}
            </div>
            <div id="author"
                class="flex flex-col items-center justify-center bg-white rounded-lg shadow-lg p-5 border border-gray-100">
                <img alt="" src="{{$post->user->profile_photo_url}}" height="96" width="96" loading="lazy"
                    decoding="async"
                    class="avatar avatar-96 photo h-24 w-24 rounded-full bg-blue-500/10 object-contain mb-5">
                <h5 class="text-xl font-medium"><a href="#" class="inline-block">
                        {{$post->user->name}}
                    </a></h5>
                <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci
                    dignissimos hic cum enim harum, voluptatibus, vero sit quasi fugiat, recusandae quis ea consequuntur
                    omnis exercitationem. Voluptas, enim. Delectus, cupiditate similique.</p>
                <div class="flex">
                    <a href="" target="_blank" class="mx-2 hover:text-blue"><i class="fab fa-linkedin text-xl"></i></a>
                    <a href="" target="_blank" class="mx-2 hover:text-blue"><i class="fab fa-instagram text-xl"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-5 mb-20 sm:mb-32 lg:px-10 text-gray-600">
        <div class="flex items-end justify-between font-medium mb-10">
            <div class="block"><span class="uppercase text-blue-800 text-sm">Artikel</span>
                <h2 class="font-bold text-2xl md:text-3xl">Lainnya</h2>
            </div>
        </div>
        <div id="list-post"
            class="transition-all ease-in-out -mx-2 lg:mx-0 grid grid-cols-2 gap-2 lg:grid-cols-3 lg:gap-10">
            <div class="post px-2 whitespace-normal mb-3 lg:mb-0 lg:px-0">
                <article
                    class="transition-all duration-200 transform lg:hover:-translate-y-2 bg-white shadow-lg rounded-md thumbnail post-25103 post type-post status-publish format-standard has-post-thumbnail hentry category-berita tag-cara-kerja-sistem-operasi tag-fungsi-dari-sistem-operasi-adalah tag-sistem-operasi-adalah">
                    <a href="https://www.domainesia.com/berita/sistem-operasi-adalah/"><img width="373" height="163"
                            src="https://www.domainesia.com/wp-content/uploads/2023/01/Sistem_Operasi_blog-373x163.jpeg"
                            alt="" decoding="async" loading="lazy" sizes="(max-width: 373px) 100vw, 373px"
                            class="object-cover w-full h-24 lg:h-40 rounded-lg md:mb-2 wp-post-image"></a>
                    <div class="px-3 py-2 overflow-x-hidden">
                        <div class="flex justify-between items-center mb-2">
                            <ul class="flex text-xs text-blue-800 font-medium -mx-1">
                                <li class="px-1"><a href="https://www.domainesia.com/./berita/">Berita</a></li>
                            </ul>
                        </div>
                        <div class="flex justify-between items-start">
                            <h2
                                class="entry-title text-sm lg:text-lg font-bold lg:font-medium mb-2 overflow-hidden h-10 lg:h-14">
                                <a href="https://www.domainesia.com/berita/sistem-operasi-adalah/"
                                    class="hover:text-gray-500">Sistem Operasi Adalah: Cara Kerja, Fungsi, Jenis, dan
                                    Contohnya</a>
                            </h2>
                        </div>
                        <div class="mb-2 text-xs text-gray-300 items-center -mx-2 "><span
                                class="block md:inline-block px-2">Oleh
                                <a href="https://www.domainesia.com/author/mila/" class="inline-block"><span
                                        class="text-gray-500 hover:text-gray-500 font-medium capitalize">Mila
                                        Rosyida</span></a></span> <time id="postDate"
                                class="block md:inline-block px-2 md:float-right">27 Maret 2023</time></div>
                    </div>
                </article>
            </div>
            <div class="post px-2 whitespace-normal mb-3 lg:mb-0 lg:px-0">
                <article
                    class="transition-all duration-200 transform lg:hover:-translate-y-2 bg-white shadow-lg rounded-md thumbnail post-20008 post type-post status-publish format-standard has-post-thumbnail hentry category-berita tag-availability tag-cloud-hosting-adalah tag-cloud-hosting-domainesia tag-keamanan-yang-tinggi tag-kecepatan tag-skalabilitas">
                    <a href="https://www.domainesia.com/berita/cloud-hosting-adalah/"><img width="373" height="163"
                            src="https://www.domainesia.com/wp-content/uploads/2021/12/34._Memahami_Cloud_Hosting_Adalah_Solusi_Performa_Web_Terbaik-373x163.jpg"
                            alt="" decoding="async" loading="lazy"
                            srcset="https://www.domainesia.com/wp-content/uploads/2021/12/34._Memahami_Cloud_Hosting_Adalah_Solusi_Performa_Web_Terbaik-373x163.jpg 373w, https://www.domainesia.com/wp-content/uploads/2021/12/34._Memahami_Cloud_Hosting_Adalah_Solusi_Performa_Web_Terbaik-250x109.jpg 250w, https://www.domainesia.com/wp-content/uploads/2021/12/34._Memahami_Cloud_Hosting_Adalah_Solusi_Performa_Web_Terbaik-768x336.jpg 768w, https://www.domainesia.com/wp-content/uploads/2021/12/34._Memahami_Cloud_Hosting_Adalah_Solusi_Performa_Web_Terbaik.jpg 800w"
                            sizes="(max-width: 373px) 100vw, 373px"
                            class="object-cover w-full h-24 lg:h-40 rounded-lg md:mb-2 wp-post-image"></a>
                    <div class="px-3 py-2 overflow-x-hidden">
                        <div class="flex justify-between items-center mb-2">
                            <ul class="flex text-xs text-blue-800 font-medium -mx-1">
                                <li class="px-1"><a href="https://www.domainesia.com/./berita/">Berita</a></li>
                            </ul>
                        </div>
                        <div class="flex justify-between items-start">
                            <h2
                                class="entry-title text-sm lg:text-lg font-bold lg:font-medium mb-2 overflow-hidden h-10 lg:h-14">
                                <a href="https://www.domainesia.com/berita/cloud-hosting-adalah/"
                                    class="hover:text-gray-500">Memahami Cloud Hosting Adalah Solusi Performa Web
                                    Terbaik</a>
                            </h2>
                        </div>
                        <div class="mb-2 text-xs text-gray-300 items-center -mx-2 "><span
                                class="block md:inline-block px-2">Oleh
                                <a href="https://www.domainesia.com/author/ratna/" class="inline-block"><span
                                        class="text-gray-500 hover:text-gray-500 font-medium capitalize">Ratna
                                        Patria</span></a></span> <time id="postDate"
                                class="block md:inline-block px-2 md:float-right">21 Februari 2023</time></div>
                    </div>
                </article>
            </div>
            <div class="post px-2 whitespace-normal mb-3 lg:mb-0 lg:px-0">
                <article
                    class="transition-all duration-200 transform lg:hover:-translate-y-2 bg-white shadow-lg rounded-md thumbnail post-7739 post type-post status-publish format-standard has-post-thumbnail hentry category-tips tag-wordpress tag-wordpress-adalah tag-wordpress-admin-login tag-wordpress-atau-blogger tag-wordpress-free tag-wordpress-gratis tag-wordpress-template tag-wordpress-theme-free tag-wordpress-tutorial">
                    <a href="https://www.domainesia.com/tips/apa-itu-wordpress/"><img width="373" height="163"
                            src="https://www.domainesia.com/wp-content/uploads/2023/03/1-1-373x163.jpeg" alt=""
                            decoding="async" loading="lazy"
                            srcset="https://www.domainesia.com/wp-content/uploads/2023/03/1-1-373x163.jpeg 373w, https://www.domainesia.com/wp-content/uploads/2023/03/1-1-250x109.jpeg 250w, https://www.domainesia.com/wp-content/uploads/2023/03/1-1-768x336.jpeg 768w, https://www.domainesia.com/wp-content/uploads/2023/03/1-1.jpeg 800w"
                            sizes="(max-width: 373px) 100vw, 373px"
                            class="object-cover w-full h-24 lg:h-40 rounded-lg md:mb-2 wp-post-image"></a>
                    <div class="px-3 py-2 overflow-x-hidden">
                        <div class="flex justify-between items-center mb-2">
                            <ul class="flex text-xs text-blue-800 font-medium -mx-1">
                                <li class="px-1"><a href="https://www.domainesia.com/./tips/">Tips</a></li>
                            </ul>
                        </div>
                        <div class="flex justify-between items-start">
                            <h2
                                class="entry-title text-sm lg:text-lg font-bold lg:font-medium mb-2 overflow-hidden h-10 lg:h-14">
                                <a href="https://www.domainesia.com/tips/apa-itu-wordpress/"
                                    class="hover:text-gray-500">Apa Itu WordPress? Pengertian, Kelebihan dan
                                    Fungsinya</a>
                            </h2>
                        </div>
                        <div class="mb-2 text-xs text-gray-300 items-center -mx-2 "><span
                                class="block md:inline-block px-2">Oleh
                                <a href="https://www.domainesia.com/author/ayoni/" class="inline-block"><span
                                        class="text-gray-500 hover:text-gray-500 font-medium capitalize">Ayoni
                                        Sulthon</span></a></span> <time id="postDate"
                                class="block md:inline-block px-2 md:float-right">27 Maret 2023</time></div>
                    </div>
                </article>
            </div>
        </div>
    </div>


</section>
@endsection