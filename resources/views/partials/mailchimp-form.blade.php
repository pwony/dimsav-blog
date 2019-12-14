@component('p')
    <label for="mce-EMAIL">Would you like me to email you new articles?</label>
@endcomponent

<div id="mc_embed_signup" class="px-4 -mt-5 mb-5" style="clear:left; width:100%;">
    <form action="https://dimsav.us4.list-manage.com/subscribe/post?u=0750ce76238b7d07a5c150cd3&amp;id=7b03b80cae"
          method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate flex flex-col mx-6 items-center justify-center mx-auto text-center" target="_blank" novalidate
          style="padding: 10px 0 10px 0; max-width: 500px"
    >
        <div class="w-full mb-2">
            <input type="email" value="" name="EMAIL" id="mce-EMAIL"
                   placeholder="email address" required autofocus
                   class="email p-4 rounded w-full inline-block bg-white border border-gray-500 py-2">
        </div>
        <div class=" w-full">
            {{-- real people should not fill this in and expect good things - do not remove this or risk form bot signups --}}
            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                <input type="text" name="b_0750ce76238b7d07a5c150cd3_7b03b80cae" tabindex="-1" value="">
            </div>
            <div class="clear">
                <input type="submit" value="Subscribe" name="subscribe"
                       id="mc-embedded-subscribe" class="button rounded cursor-pointer text-white text-center w-full bg-blue-900 py-2 hover:bg-blue-800 inline-block"
                       style="-webkit-appearance: button">
            </div>
        </div>
    </form>
</div>
