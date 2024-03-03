<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    test
</div>

<script type="module">
    Livewire.hook('request', ({ {{ route('stats.api.dashboards.index') }}, options, payload, respond, succeed, fail }) => {
    // Runs after commit payloads are compiled, but before a network request is sent...
 
    respond(({ status, response }) => {
        // Runs when the response is received...
        // "response" is the raw HTTP response object
        // before await response.text() is run...
        console.log(status, response)
    })
 
    succeed(({ status, json }) => {
        // Runs when the response is received...
        // "json" is the JSON response object...
        console.log(status, json)

    })
 
    fail(({ status, content, preventDefault }) => {
        // Runs when the response has an error status code...
        // "preventDefault" allows you to disable Livewire's
        // default error handling...
        // "content" is the raw response content...
        console.log(status, content, preventDefault)

    })
})
</script>