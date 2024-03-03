<div>
    <div  id="justifiedGallery">
        @foreach ($galleries as $gallery)
        <a >
            <img alt="caption for image {{ $gallery->id }}" src="https://source.unsplash.com/featured/300x20{{ $gallery->id }}" data-modal-target="modal-{{ $gallery->id }}" data-modal-show="modal-{{ $gallery->id }}" data-modal-backdrop="static"/>
            <!-- Main modal -->

            <div id="modal-{{ $gallery->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                {{ $gallery->title }}
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-{{ $gallery->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                                <div class="flex flex-col items-start bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full min-h-96">
                                    <img class="object-cover w-3/5 rounded-t-lg min-h-96 md:rounded-none md:rounded-s-lg" src="https://source.unsplash.com/featured/300x20{{ $gallery->id }}" alt="">
                                    <div class="flex flex-col w-2/5 justify-between p-4 leading-normal overflow-auto">
                                        <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
                                            <div class="w-full mx-auto px-4">
                                                <div class="flex justify-between items-start mb-6">
                                                  <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Comments (20)</h2>
                                              </div>
                                              <form class="mb-6">
                                                  <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                                      <label for="comment" class="sr-only">Your comment</label>
                                                      <textarea id="comment" rows="6"
                                                          class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                                          placeholder="Write a comment..." required></textarea>
                                                  </div>
                                                  <button type="submit"
                                                      class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                                      Post comment
                                                  </button>
                                              </form>
                                            </div>
                                            <article class="p-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">
                                                <footer class="flex justify-between items-center mb-2">
                                                    <div class="flex items-center">
                                                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                                                                class="mr-2 w-6 h-6 rounded-full"
                                                                alt="Jese Leos">Jese Leos</p>
                                                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-12"
                                                                title="February 12th, 2022">Feb. 12, 2022</time></p>
                                                    </div>
                                                    <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2"
                                                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-40 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                                        type="button">
                                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                                        </svg>
                                                        <span class="sr-only">Comment settings</span>
                                                    </button>
                                                    <!-- Dropdown menu -->
                                                    <div id="dropdownComment2"
                                                        class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                            aria-labelledby="dropdownMenuIconHorizontalButton">
                                                            <li>
                                                                <div href="#"
                                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</div>
                                                            </li>
                                                            <li>
                                                                <div href="#"
                                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</div>
                                                            </li>
                                                            <li>
                                                                <div href="#"
                                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </footer>
                                                <p class="text-gray-500 dark:text-gray-400">Much appreciated! Glad you liked it ☺️</p>
                                                <div class="flex items-center mt-4 space-x-4">
                                                    <button type="button"
                                                        class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                                        <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                                                        </svg>                
                                                        Reply
                                                    </button>
                                                </div>
                                            </article>
                                            <article class="p-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">
                                                <footer class="flex justify-between items-center mb-2">
                                                    <div class="flex items-center">
                                                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                                                                class="mr-2 w-6 h-6 rounded-full"
                                                                alt="Jese Leos">Jese Leos</p>
                                                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-12"
                                                                title="February 12th, 2022">Feb. 12, 2022</time></p>
                                                    </div>
                                                    <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2"
                                                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-40 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                                        type="button">
                                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                                        </svg>
                                                        <span class="sr-only">Comment settings</span>
                                                    </button>
                                                    <!-- Dropdown menu -->
                                                    <div id="dropdownComment2"
                                                        class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                            aria-labelledby="dropdownMenuIconHorizontalButton">
                                                            <li>
                                                                <div href="#"
                                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</div>
                                                            </li>
                                                            <li>
                                                                <div href="#"
                                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</div>
                                                            </li>
                                                            <li>
                                                                <div href="#"
                                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </footer>
                                                <p class="text-gray-500 dark:text-gray-400">Much appreciated! Glad you liked it ☺️</p>
                                                <div class="flex items-center mt-4 space-x-4">
                                                    <button type="button"
                                                        class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                                        <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                                                        </svg>                
                                                        Reply
                                                    </button>
                                                </div>
                                            </article>
                                          </section>
                                    </div>
                                </div>

                    </div>
                </div>
            </div>
        </a>

            
        @endforeach 
    
    </div>
    <div id="paginate" class="hidden bottom-0 p-3">
        {{ $galleries->links() }}

    </div>
</div>
<script type="module">
    $(document).ready(function(){
        initGallery();
        $('#paginate').show('block');
    })
    function initGallery(){
        $("#justifiedGallery").justifiedGallery({
                rowHeight : 300,
                lastRow : 'justify',
                margins : 5,
                border: 10
        });
    }
 
    Livewire.hook('morph.updated', ({ el, component }) => {

        initGallery();
    
    })

 

</script>