<div>
    <flux:modal name="create-post" class="md:w-200">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create post</flux:heading>
                <flux:text class="mt-2">Add details for the post. Let's add details.</flux:text>
            </div>

            <flux:input  wire:model="title" label="Title" placeholder="your title" />
            <flux:textarea wire:model="body" label="Body" placeholder="your body" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="submit">Save</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
