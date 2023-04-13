<header x-data="{open : false}" class="fixed z-50 top-0 bg-blue-800 text-white w-full shadow-lg">
    <div class="container mx-auto px-2 lg:px-10">
        <div class="flex items-center py-3">
            <div class="flex lg:w-1/4 lg:mr-0 px-3">
                <h1 class="font-bold uppercase md:text-xl lg:text-3xl">
                    <a href="/" class="block">Blog</a>
                </h1>
            </div>
            <div class="search relative w-full"><input type="search" name="s" placeholder="Cari Artikel / Panduan"
                    class="outline-none flex items-center rounded-full pl-12 pr-3 py-2 w-full transition-colors duration-100 ease-in-out text-gray-400 text-sm placeholder-gray-300 bg-gray-100 border border-transparent focus:border-gray-200 focus:bg-white aa-input"
                    autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false"
                    aria-owns="algolia-autocomplete-listbox-0" dir="auto" style="">
                <pre aria-hidden="true"
                    style="position: absolute; visibility: hidden; white-space: pre; font-family: Rubik, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: normal; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre>
                <span class="pl-5 absolute inset-y-0 left-0 flex items-center text-gray-300"><i
                        class="fas fa-search"></i></span>
            </div>
            <div class="hidden lg:flex lg:w-1/4 justify-end">
                <div class="flex items-center text-lg no-underline text-white pr-6">
                    <a class="" href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="pl-6" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="pl-6" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="pl-6" href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
            <button @click="open = !open" class="block lg:hidden px-3 mx-auto"><i class="fas fa-bars"></i></button>
        </div>
    </div>
    <div x-cloak x-bind:class="! open ? 'hidden' : ''" class="container lg:block mx-auto">
        <nav>
            <div class="">
                <ul class="flex lg:justify-center capitalize overflow-x-auto whitespace-no-wrap">
                    @foreach ($postCategory as $item)
                    <li class="hover:-translate-y-1 transition-all px-5">
                        <a href="" class="relative py-3 font-medium block text-sm">{{$item->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</header>