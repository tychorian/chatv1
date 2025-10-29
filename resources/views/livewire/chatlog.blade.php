    <div class="flex-1 xl:py-10">
        <div class="relative mx-auto flex max-w-[720px] flex-col">
            <div x-data x-init="$wire.on('scrollToBottom', () => {
                $nextTick(() => {
                    $el.scrollTop = $el.scrollHeight;
                });
            });" class="relative z-20 max-h-[50vh] flex-1 space-y-7 overflow-y-auto pb-10 lg:pb-7">

                @foreach ($messages as $message)
                    @if ($message['sender'] == 'user')
                        <!-- User Message -->
                        <div class="flex justify-end">
                            <div class="bg-green-100 dark:bg-green-700 max-w-[480px] rounded-xl rounded-tr-xs px-4 py-3">
                                <p class="text-left text-sm font-normal text-gray-800 dark:text-white/90">
                                    {{ $message['message'] }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if ($message['sender'] == 'bot')
                        <!-- AI Response -->
                        <div class="flex justify-start">
                            <div class="max-w-[480px] rounded-xl rounded-tl-xs bg-gray-100 px-4 py-3 dark:bg-gray-800">
                                <p class="mb-5 text-sm leading-5 text-gray-800 dark:text-white/90">
                                    {{ $message['message'] }}
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Fixed Input Wrapper -->
            <div class="fixed bottom-5 left-1/2 z-20 w-full -translate-x-1/2 transform px-4 sm:px-6 lg:bottom-10 lg:px-8">
                <!-- Container with max width -->
                <div class="mx-auto w-full max-w-[720px] rounded-2xl border border-gray-200 bg-white p-5 shadow-xs dark:border-gray-800 dark:bg-gray-800">
                    <form wire:submit="submit">
                        <flux:textarea rows="2" label="Ask a question and press Enter key or click Submit button." placeholder="Where is Singapore?" wire:model="prompt" wire:keydown.enter="submit" />

                        <flux:button class="mt-3" variant="primary" type="submit">Submit</flux:button>
                    </form>
                </div>
            </div>
        </div>
    </div>
