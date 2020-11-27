<div>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <section>
                    @if ($image)
                    <img src="{{ $image }}" width="100" height="100" class="img-responsive">
                    @endif
                    <div class="form-group">
                        <input type="file" id="image" wire:change="$emit('fileChoosen')" class="form-control">
                    </div>
                </section>
                <form wire:submit.prevent="addComment" class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <input type="text" wire:model.lazy="newComment" class="form-control @error('newComment') is-invalid @enderror">
                            @error('newComment')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary btn-block" >Add</button>
                    </div>
                </form>

                @foreach ($comments as $comment)
                    <div class="p-3 border mb-2">
                        <h5>{{ $comment->creator->name ?? '' }}😃</h5>
                        <p class=" small">{{ $comment->created_at->diffForHumans() }}</p>

                        <p class="mt-3">{{ $comment->body }}</p>
                        <button class="btn-xs btn-danger btn" wire:click="remove({{ $comment->id }})">x</button>
                    </div>
                @endforeach
                {{ $comments->links('pagination-links') }}
            </div>
        </div>
    </div>
</div>

<script>
    window.livewire.on('fileChoosen', () => {
        let file = document.getElementById('image').files[0]
        let reader = new FileReader()
        reader.onloadend = () => {
            window.livewire.emit('uploadImage', reader.result)
        }
        reader.readAsDataURL(file)
    })
</script>