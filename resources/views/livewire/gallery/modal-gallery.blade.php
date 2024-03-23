<div>

    <a class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row w-full h-full hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <div class="p-8 w-full max-h-fit flex justify-center">

            <img class="object-cover w-2/4 rounded-t-lg md:rounded-none md:rounded-s-lg" src="{{ asset('storage/' .$gallery->content) }}" alt="">
            <div class="flex flex-col items-center w-2/4">
                <div class="flex flex-col  w-2/4 justify-end p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">10</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Conment</p>
                </div>
                <div class="flex flex-col  w-2/4 justify-end p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $gallery->title}}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$gallery->creator->firstname .' '. $gallery->creator->lastname}}</p>
                </div>
            </div>
        </div>
    </a>
</div>
