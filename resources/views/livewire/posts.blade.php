<div>
    <flux:modal.trigger name="create-post">
        <flux:button>Create post</flux:button>
    </flux:modal.trigger>

    <livewire:post-create />
    <livewire:post-edit />

    <flux:modal name="delete-post" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete post?</flux:heading>

                <flux:text class="mt-2">
                    <p>You're about to delete this post.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="danger" wire:click="confirmDelete()">Delete post</flux:button>
            </div>
        </div>
    </flux:modal>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Body</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
           @forelse($posts as $post)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $post['id'] }}</td>
                    <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{ $post['title'] }}</td>
                    <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{ $post['body'] }}</td>
                    <td class="px-6 py-2 space-x-2">
                        <flux:button size="sm" wire:click="editPost({{$post->id}})">Edit</flux:button>
                        <flux:button size="sm" variant="danger" wire:click="deletePost({{$post->id}})">Delete</flux:button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-2 text-center text-gray-600 dark:text-gray-300">No posts available</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
