<div>
     <div x-data="
        {
            editReply: false,
            focus: function () {
                const textInput = this.$refs.textInput;
                textInput.focus();
                console.log('textInput');
            },
        }" x-cloak>

          <div x-show="!editReply" class="relative">
               {{$replyOrigBody}}
               <x-link.secondary
                       class="absolute cursor-pointer top-2 right-2"
                       x-on:click="editReply = true; $nextTick(() => focus())">
                    {{ __('Edit') }}
                </x-link.secondary>
          </div>

          <div x-show="editReply">
               <form wire:submit.prevent="updateReply">
                    <input
                            type="text"
                            class="w-full bg-gray-100 border-none shadow-inner focus:ring-blue-500"
                            name="replyNewBody"
                            wire:model.lazy="replyNewBody"
                            x-ref="textInput"
                            x-on:keydown.enter="editReply = false"
                            x-on:keydown.escape="editReply = false" >
                    <div class="mt-2 space-x-3 text-sm">
                         <button type="button" class="text-green-400" x-on:click="editReply = false">
                              {{ __('Save') }}
                            </button>
                            <button type="button" class="text-red-400" x-on:click="editReply = false">
                                {{ __('Cancel') }}
                            </button>
                    </div>
                 </form>
          </div>
     </div>
</div>
