<div>
    <flux:modal name="edit-post" class="md:w-200">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Edit post</flux:heading>
                <flux:text class="mt-2">Edit details for the post. Let's edit details.</flux:text>
            </div>

            <flux:input  wire:model="title" label="Title" placeholder="your title" />
            <flux:textarea wire:model="body" label="Body" placeholder="your body" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="updatePost">Update</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
