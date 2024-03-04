<div>
    <div  id="justifiedGallery">
        @foreach ($galleries as $gallery)
        <a href="{{ route('gallery', ['id' => $gallery->id]) }}" wire:navigate.hover>
            <img alt="{{ $gallery->title }}" src="{{ asset('storage/' .$gallery->content) }}" />
 
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