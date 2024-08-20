@props([
    'placeholder' => ''
    ])
<div class="max-w-sm w-full space-y-5">
    <!-- Floating Textarea -->
    <div class="relative">
    <textarea {{$attributes}} id="hs-floating-textarea" class="peer p-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-pink-500 focus:ring-pink-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:ring-neutral-600
    focus:pt-6
    focus:pb-2
    [&:not(:placeholder-shown)]:pt-6
    [&:not(:placeholder-shown)]:pb-2
    autofill:pt-6
    autofill:pb-2" placeholder="This is a textarea placeholder"></textarea>
        <label for="hs-floating-textarea" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent origin-[0_0] peer-disabled:opacity-50 peer-disabled:pointer-events-none
      peer-focus:text-xs
      peer-focus:-translate-y-1.5
      peer-focus:text-gray-500 dark:peer-focus:text-neutral-500
      peer-[:not(:placeholder-shown)]:text-xs
      peer-[:not(:placeholder-shown)]:-translate-y-1.5
      peer-[:not(:placeholder-shown)]:text-gray-500 dark:peer-[:not(:placeholder-shown)]:text-neutral-500 dark:text-neutral-500">{{$placeholder}}</label>
    </div>
    <!-- End Floating Textarea -->

</div>
<script>
    (function () {
        function textareaAutoHeight(el, offsetTop = 0) {
            el.style.height = 'auto';
            el.style.height = `${el.scrollHeight + offsetTop}px`;
        }

        (function () {
            const textareas = [
                '#hs-floating-textarea',
                '#hs-floating-textarea-gray',
                '#hs-floating-textarea-underline'
            ];

            textareas.forEach((el) => {
                const textarea = document.querySelector(el);
                const overlay = textarea.closest('.hs-overlay');

                if (overlay) {
                    const { element } = HSOverlay.getInstance(overlay, true);

                    element.on('open', () => textareaAutoHeight(textarea, 3));
                } else textareaAutoHeight(textarea, 3);

                textarea.addEventListener('input', () => {
                    textareaAutoHeight(textarea, 3);
                });
            });
        })();
    })()
</script>
