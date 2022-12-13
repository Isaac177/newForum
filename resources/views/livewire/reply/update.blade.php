<div>

     <div x-data="
        {
            editReply: false,
            focus: function () {
                const textInput = this.$refs.textInput;
                textInput.focus();
                console.log('textInput');
            },

        }
     ">
          <form wire:submit.prevent="updateReply">
               <textarea
                    wire:model="body"
                    class="w-full p-2 border border-gray-300 rounded"
                    placeholder="Have something to say?"
               ></textarea>
               @error('body')
               <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
               @enderror
               <div class="flex justify-end mt-2">
                    <button
                         type="submit"
                         class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600"
                    >
                         Update
                    </button>
               </div>
            </form>
     </div>
</div>
